<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;

Route::get('/messages/{user}', [MessageController::class, 'index'])->middleware('auth');
Route::post('/messages/{user}', [MessageController::class, 'store'])->middleware('auth');


// Rutas para enviar, aceptar y rechazar solicitudes de amistad
Route::post('/friends/request/{user}', [FriendController::class, 'sendRequest'])->middleware('auth');
Route::post('/friends/accept/{user}', [FriendController::class, 'acceptRequest'])->middleware('auth');
Route::post('/friends/reject/{user}', [FriendController::class, 'rejectRequest'])->middleware('auth');


Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
