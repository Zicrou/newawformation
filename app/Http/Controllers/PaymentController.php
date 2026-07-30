<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use Illuminate\Support\Facades\Log;
use \App\Models\Enrollment;
use \App\Models\CartItem;
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
                'user_id' => auth()->id(),
            ],

            'success_url' => route('payments.success') . '?session_id={CHECKOUT_SESSION_ID}',

            'cancel_url' => route('payments.cancel'),
        ]);

        return redirect($session->url);
    }


    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);


        if ($session->payment_status === 'paid') {

            $order = Order::findOrFail(
                $session->metadata->order_id
            );


            if ($order->status !== 'paid') {

                $order->update([
                    'status' => 'paid',
                    'payment_method' => 'stripe',
                    'transaction_id' => $session->payment_intent,
                    'paid_at' => now(),
                ]);

                foreach($order->items as $item) {
                    Enrollment::create([
                        'user_id' => auth()->id(),
                        'cours_id' => $item->cours_id
                    ]);

                    CartItem::where('cours_id', $item->cours_id)
                        ->whereHas('cart', function ($query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->delete();
                }

                

                

            }


        } else {

            abort(400, 'Paiement non confirmé');

        }


        return view('payments.success', compact('order'));
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

        try {

            $event = Webhook::constructEvent(
                $payload,
                $signature,
                config('services.stripe.webhook_secret')
            );

        } catch (\UnexpectedValueException $e) {

            Log::error('Webhook Stripe payload invalide');

            return response()->json([], 400);

        } catch (SignatureVerificationException $e) {

            Log::error('Signature Stripe invalide');

            return response()->json([], 400);

        }


        Log::info('Stripe webhook reçu', [
            'type' => $event->type,
        ]);


        if ($event->type === 'checkout.session.completed') {

            $session = $event->data->object;


            Log::info('Session Stripe', [
                'order_id' => $session->metadata->order_id ?? null,
                'payment_status' => $session->payment_status,
            ]);


            if ($session->payment_status !== 'paid') {
                return response()->json([
                    'received' => true
                ]);
            }


            $order = Order::find(
                $session->metadata->order_id
            );


            if (!$order) {

                Log::error('Commande introuvable', [
                    'order_id' => $session->metadata->order_id,
                ]);

                return response()->json([
                    'received' => true
                ]);
            }


            if ($order->status !== 'paid') {

                $order->update([

                    'status' => 'paid',

                    'payment_method' => 'stripe',

                    'transaction_id' => $session->payment_intent,

                    'paid_at' => now(),

                ]);

                Log::info('Commande payée', [
                    'order_id' => $order->id,
                ]);

                Log::info('Enregistrement de l\' enrollment', [
                    'order_id' => $order->id,
                ]);

                foreach($order->items as $item){
                    \App\Models\Enrollment::create([
                        'user_id' => auth()->id(),
                        'cours_id' => $order->id,
                    ]);
                }

                Log::info('Enrollment enreggistré', [
                    'order_id' => $order->id,
                ]);

            }
        }


        return response()->json([
            'received' => true
        ]);
    }


    public function status(Order $order)
    {
        abort_unless(
            $order->user_id === auth()->id(),
            403
        );

        return response()->json([
            'status' => $order->status,
        ]);
    }

    public function create(Order $order)
    {
        return view('payments.create', compact('order'));

    }
}