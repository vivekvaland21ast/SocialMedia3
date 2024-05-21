<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;


// Login routes
Route::get('/', [LoginUserController::class, 'loginShow']);
Route::post('/login', [LoginUserController::class, 'login'])->name('login');

//logout
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

// Registration route
Route::post('/register', [RegisterUserController::class, 'userRegister'])->name('register');


// Protected routes
Route::middleware('auth')->group(function () {
    //home page
    Route::get('/home', [PostsController::class, 'index'])->name('posts.home');

    //upload post
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    //profile page
    Route::get('/profile', [ProfilesController::class, 'showProfile'])->name('profile');

    //like dislike
    Route::post('/post/{post}/like', 'PostLikeController@like')->name('post.like');
    Route::post('/post/{post}/dislike', 'PostLikeController@dislike')->name('post.dislike');

});

//posts
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::put('userData/{id}', [PostsController::class, 'update'])->name('posts.update');

//likes
Route::post('/toggle-like', [PostLikeController::class, 'toggleLike'])->name('posts.toggle-like');

//comments
Route::post('/comments', [PostCommentsController::class, 'store'])->name('comments.store');
Route::get('/comments/{postId}', [PostCommentsController::class, 'fetchComments'])->name('comments.fetch');
Route::put('/comments/{comment}', [PostCommentsController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [PostCommentsController::class, 'destroy'])->name('comments.destroy');

//edit profile
Route::post('/update-profile', [ProfilesController::class, 'updateProfile'])->name('updateProfile');

//friend
Route::get('/friends', [FriendsController::class, 'showFriends'])->name('show-friends');
Route::post('/toggle-friend', [FriendsController::class, 'toggleFriend'])->name('toggle-friend');

//view friend
Route::get('/fetch-friends', [FriendsController::class, 'fetchFriends'])->name('fetch-friends');