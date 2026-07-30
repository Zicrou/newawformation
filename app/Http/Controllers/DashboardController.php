<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Cart;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'carts' => Cart::where('user_id', Auth::id())->get(),

            'likes' => Like::where('user_id', Auth::id())
                ->with('cours')
                ->latest()
                ->get(),

            'coursesCount' => Cours::count(),

            'likesCount' => Like::where('user_id', Auth::id())->count(),

            'cartCount' => Cart::where('user_id', Auth::id())->count(),
            'coursAcheter' => \App\Models\Enrollment::where('user_id', Auth::id())->with('cours')->get(),
        ]);
    }
}
