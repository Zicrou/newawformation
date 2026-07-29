<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Order;
use App\Models\CartItems;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{


    public function store(Request $request)
    {
        
        $request->validate(
            [
                'items' => ['required', 'array'],
                'items.*' => ['exists:cart_items,id'],
            ],
            [
                'items.required' => 'Veuillez sélectionner au moins une formation.',
            ],
            [
                'items' => 'formations',
            ]
        );


        // $cart = auth()->user()->cart;
        
        // $order = DB::transaction(function() use ($request){


            $cartItems = CartItems::whereIn(
                'id',
                $request->items
            )
            ->whereHas('cart', function($query){

                $query->where('user_id', auth()->id());

            })
            ->with('cours')
            ->get();


            
            $total = $cartItems->sum(function($item){
                
                return $item->cours->price;
                
                });
                
                
                $order = Order::create([
                    
                    'user_id'=>auth()->id(),
                    
                    'total'=>$total,
                    
                    'status'=>'pending',
                    'payment_method'=> 'carte',
                    'transaction_id' => '111'
                    
                    ]);            

            foreach($cartItems as $item){

                $order->items()->create([

                    'cours_id'=>$item->cours_id,

                    'price'=>$item->cours->price

                ]);

            }

        return redirect()
            ->route('orders.show',$order)
            ->with('success','Commande créée');

    }

    public function show(Order $order)
    {

        abort_unless(
            $order->user_id === auth()->id(),
            403
        );


        $order->load('items.cours');


        return view(
            'orders.show',
            compact('order')
        );

    }

    public function annulation(Order $order)
    {

        abort_unless(
            $order->user_id === auth()->id(),
            403
        );


        $order->items()->delete();
        $order->delete();


        return redirect()->route('cart.index');

    }
}
