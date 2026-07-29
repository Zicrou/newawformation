<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;

$idRegex = '[0-9a-z\-]+';
$slugRegex = '[0-9a-z\-]+';
// Cours
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cours', [App\Http\Controllers\CourController::class, 'index'])->name('cour.index');
Route::get('/cours/{slug}/{cour}', [App\Http\Controllers\CourController::class, 'show'])->name('cour.show')->where([
    'cour' => $idRegex,
    'slug' => $slugRegex,
]);
Route::post('/cours/{cour}/contact', [\App\Http\Controllers\CourController::class, 'contact'])->name('cour.contact')->where([
    'cour' => $idRegex,
]);
// Likes
// Route::middleware('auth')->group(function () {
//     Route::post('/cours/likes/{courId}', [CourController::class, 'likeCour'])
//         ->name('likes.cours');
// });
Route::post('/cours/likes/{courId}', [CourController::class, 'likeCour'])->name('like.cour')->where([
    'courId' => $idRegex,
]);
// Panier
Route::middleware('auth')->group(function () {

    Route::get('panier', [CartController::class, 'index'])->name('cart.index');
    
        
    Route::delete('/panier/item/{item}', [CartController::class, 'removeItem'])
        ->name('cart.item.destroy');
    
    Route::post('/panier/store', [CartController::class, 'store'])
    ->name('cart.store');



});


    //Admins
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::resource('cours', \App\Http\Controllers\Admin\CourController::class)->except(['show']);
    Route::resource('tag', TagController::class)->except(['show']);
});
    //Services
Route::get('services', function () {
    return view('services');
})->name('services');

    //Breezes, dashboards routes 
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    //ckEditors
Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])
    ->name('ckeditor.upload');
    
    //Stripes
Route::get('/stripe', [StripeController::class, 'stripe'])->name('stripe.index');

Route::get('stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');

Route::get('stripe/checkout/success', [StripeController::class, 'success'])->name('stripe.checkout.success');

// Orders

Route::prefix('orders')->name('orders.')->middleware(['auth'])->group(function(){
    Route::post('/',
        [OrderController::class,'store']
    )->name('store');
        
    Route::get('/{order}', [
        OrderController::class,
        'show'
    ])->name('show');

    Route::get('/{order}/annulation', [
        OrderController::class,
        'annulation'
    ])->name('annulation');
});

require __DIR__.'/auth.php';
