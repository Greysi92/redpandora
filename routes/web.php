<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update')->middleware('auth');


// Rutas para las publicaciones
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

// Rutas para los comentarios
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');


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

Route::middleware('auth')->group(callback: function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');

});




require __DIR__.'/auth.php';
