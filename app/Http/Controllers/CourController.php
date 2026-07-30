<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursContactRequest;
use App\Http\Requests\SearchCoursRequest;
use App\Mail\CoursContactMail;
use App\Models\Cours;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Models\Enrollment;

class CourController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'title' => ['string', 'nullable'],
            'price' => ['numeric', 'nullable']
        ]);
        $price = $data['price'] ?? null;

        $title = $data['title'] ?? null;

        
        $query = Cours::query()->where('disponible', '=', 1)->with('tags')->with('cartItems')->withCount('likes');
        
        
        if ($price) {
            $query = $query->where('price', '<=', $price);
        }
            
        if ($title) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
            
        
        return view('cour.index', [
            'cours' => $query->paginate(12),
            // 'input' => $request->validated(),
            'cartCount' => Cart::where('user_id', auth()->id())->orderBy('desc')->count(),
        ]);
    }

    public function show(string $slug, Cours $cour)
    {
        if(Auth::check()){
            
            $enrollment = Enrollment::where('cours_id', $cour->id)->where('user_id', auth()->id())->first();
            
            if($enrollment){
                $acheter = true;
            }

        }else{
            
            $acheter = false;
            
        }
        $expectedSlug = $cour->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('cour.show', ['slug' => $expectedSlug, 'cour' => $cour]);
        }

        return view('cour.show', [
            'cour' => $cour,
            'acheter'=> $acheter,
        ]);
    }

    public function contact(Cours $cour, CoursContactRequest $request){
		Mail::send(new CoursContactMail($cour, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
        //Notification::route('mail', 'john@admin.fr')->notify(new CoursContactRequest($cour, )); 
    }

    public function likeCour(String$courId)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Please log in first.'
            ], 401);
        }

        $user = Auth::user();

        $cour = Cours::findOrFail($courId);

        if ($cour->likes()->where('user_id', $user->id)->exists()) {
            $cour->likes()->where('user_id', $user->id)->delete();

            return response()->json([
                'status' => 'unliked',
                'likesCount' => $cour->likes()->count()
            ]);
        }

        $cour->likes()->create([
            'user_id' => $user->id
        ]);

        return response()->json([
            'status' => 'liked',
            'likesCount' => $cour->likes()->count()
        ]);
    }
}
