<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;


// Rutas para publicaciones
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

// Rutas para solicitudes de amistad
Route::get('/friends/potential', [FriendController::class, 'potentialFriends'])->middleware('auth');
Route::post('/friends/request/{user}', [FriendController::class, 'sendRequest'])->middleware('auth');
Route::post('/friends/accept/{user}', [FriendController::class, 'acceptRequest'])->middleware('auth');
Route::post('/friends/reject/{user}', [FriendController::class, 'rejectRequest'])->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

require __DIR__.'/auth.php';
