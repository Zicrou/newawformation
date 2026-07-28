<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\CartItems;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $cart = auth()->user()
            ->cart()
            ->with('items.cours')
            ->first();
        return view("panier.index", ["cart" => $cart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'courId' => ['required', 'exists:cours,id'],
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
            'paid' => false,
        ]);

        $item = $cart->items()
            ->where('cours_id', $request->courId)
            ->first();

        if (!$item) {

            $cart->items()->create([
                'cours_id' => $request->courId,
            ]);

            $status = 'added';

        } else {

            $status = 'exists';

        }

        return response()->json([
            'status' => $status,
            'cartCount' => $cart->items()->count(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      
        $cart = auth()->user()->cart;
        
        $item = $cart->items()
            ->where('cours_id', $request->courId)
            ->first();
          
        return to_route('cart.index')->with('success', 'Le produit a été supprimé');
    }

    public function removeItem(CartItems $item)
    {
        
        abort_unless($item->cart->user_id === auth()->id(), 403);

        $item->delete();

        $cartCount = CartItems::whereHas('cart', function ($query) {
            $query->where('user_id', auth()->id());
        })->count();

        return response()->json([
            'success' => true,
            'cartCount' => $cartCount,
        ]);
    }
}
