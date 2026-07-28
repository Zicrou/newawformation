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
        $data = $request->validate([
            'courId' => ['required', 'exists:cours,id'],
        ]);
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $cart->items()->firstOrCreate([
            'cours_id' => $data['courId'],
        ]);

        if ($cart->wasRecentlyCreated) {
            return back()->with('success', 'Cours ajouté au panier.');
        }

        return back()->with('info', 'Ce cours est déjà dans votre panier.')->with('status', 'added');
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
        $cart = Cart::where('cours_id', $request->cours)->with('cours')->where('user_id', Auth::user()->id)->first();
        // dd($cart->cours->id);
        if ($cart) {
            $cart->delete();
        }
        // $cart = Cart::where('id', $id)->first();
        // if (File::exists($cart->image)) {
        //     File::delete($cart->image);
        // }
        //$cart->delete();
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
