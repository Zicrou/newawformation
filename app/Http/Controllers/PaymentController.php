<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class PaymentController extends Controller
{

    public function store(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Commande #' . $order->id,
                    ],
                    'unit_amount' => (int) round($order->total * 100),
                ],
                'quantity' => 1,
            ]],

            'metadata' => [
                'order_id' => $order->id,
                'user_id'  => auth()->id(),
            ],

            'success_url' => route('payments.success', ['order' => $order]) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payments.cancel'),
        ]);

        return redirect($session->url);
    }

    public function create(Order $order)
    {

        return view('payments.create', compact('order'));

    }

 
    public function success(Request $request)
    {
        return view('payments.success', ['order' => $request->order]);
    }

    public function cancel()
    {
        return redirect()
            ->back()
            ->with('error', 'Paiement annulé.');
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();

        $signature = $request->header('Stripe-Signature');

        $secret = config('services.stripe.webhook_secret');

        try {

            $event = Webhook::constructEvent(
                $payload,
                $signature,
                $secret
            );

        } catch (\UnexpectedValueException $e) {

            return response()->json([],400);

        } catch (SignatureVerificationException $e) {

            return response()->json([],400);

        }

        switch ($event->type) {

            case 'checkout.session.completed':

                $session = $event->data->object;

                $order = Order::find($session->metadata->order_id);

                if (!$order) {
                    break;
                }

                if ($order->status === 'paid') {
                    break;
                }

                $order->update([
                    'status' => 'paid',
                    'payment_method' => 'stripe',
                    'transaction_id' => $session->payment_intent,
                    'paid_at' => now(),
                ]);

                break;
        }

        return response()->json(['received' => true]);
    }
}
