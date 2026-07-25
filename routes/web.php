<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CKEditorController;

$idRegex = '[0-9a-z\-]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cours', [App\Http\Controllers\CourController::class, 'index'])->name('cour.index');
Route::get('/cours/{slug}-{cour}', [App\Http\Controllers\CourController::class, 'show'])->name('cour.show')->where([
    'cour' => $idRegex,
    'slug' => $slugRegex,
]);

Route::post('/cours/{cour}/contact', [\App\Http\Controllers\CourController::class, 'contact'])->name('cour.contact')->where([
    'cour' => $idRegex,
]);
Route::middleware('auth')->group(function () {
    Route::post('/cours/likes/{courId}', [CourController::class, 'likeCour'])
        ->name('likes.cours');
});
Route::get('panier', [CartController::class, 'index'])->name('cart.index');
Route::get('panier/store', [CartController::class, 'store'])->name('cart.store');
Route::post('panier/{cartId}', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('/cours/likes/{courId}', [CourController::class, 'likeCour'])->name('like.cour')->where([
    'courId' => $idRegex,
]);
Route::get('services', function () {
    return view('services');
})->name('services');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::resource('cours', \App\Http\Controllers\Admin\CourController::class)->except(['show']);
    Route::resource('tag', TagController::class)->except(['show']);
});

Route::get('services', function () {
    return view('services');
})->name('services');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])
    ->name('ckeditor.upload');
require __DIR__.'/auth.php';
