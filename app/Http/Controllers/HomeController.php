<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {   
        if (auth()->check()) {
        $cartCount = Cart::where("user_id", auth()->user()->id)->count();
        }
        $cours = Cours::where('disponible', true)->orderBy('created_at', 'desc')->limit(7)->get();
        return view('home', ['cours' => $cours, 'cartCount' => $cartCount ?? 0]);
    }
}
