<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    // Login routes
    Route::get('/', [LoginUserController::class, 'loginShow']);
    Route::post('/login', [LoginUserController::class, 'login'])->name('login');

    // Registration route
    Route::post('/register', [RegisterUserController::class, 'userRegister'])->name('register');
});

// Protected routes
Route::middleware('auth')->group(function () {

    // Logout route
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

    // Home page
    Route::get('/home', [PostsController::class, 'index'])->name('posts.home');

    // Upload post
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    // Profile page
    Route::get('/profile', [ProfilesController::class, 'showProfile'])->name('profile');

    // Like/dislike post
    Route::post('/post/{post}/like', [PostLikeController::class, 'like'])->name('post.like');
    Route::post('/post/{post}/dislike', [PostLikeController::class, 'dislike'])->name('post.dislike');

    // Edit profile
    Route::post('/update-profile', [ProfilesController::class, 'updateProfile'])->name('updateProfile');

    // Friends
    Route::get('/friends', [FriendsController::class, 'showFriends'])->name('show-friends');
    Route::post('/toggle-friend', [FriendsController::class, 'toggleFriend'])->name('toggle-friend');
    Route::get('/fetch-friends', [FriendsController::class, 'fetchFriends'])->name('fetch-friends');

    // Notifications
    Route::get('/notification', [PostsController::class, 'index'])->name('notification');

    // Archived posts
    Route::post('/archive', [ArchiveController::class, 'archive'])->name('archive');
    Route::post('/unarchive', [ArchiveController::class, 'unarchive'])->name('unarchive');

    // Posts
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::put('/userData/{id}', [PostsController::class, 'update'])->name('posts.update');

    // Toggle like
    Route::post('/toggle-like', [PostLikeController::class, 'toggleLike'])->name('posts.toggle-like');

    // Comments
    Route::resource('comments', PostCommentsController::class)->only(['store', 'show', 'update', 'destroy']);
});

// Redirect any unauthenticated access to protected routes to login
Route::fallback(function () {
    return redirect('/');
});



// // Login routes
// Route::get('/', [LoginUserController::class, 'loginShow']);
// Route::post('/login', [LoginUserController::class, 'login'])->name('login');

// //logout
// Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

// // Registration route
// Route::post('/register', [RegisterUserController::class, 'userRegister'])->name('register');


// // Protected routes
// Route::middleware('auth')->group(function () {
//     //home page
//     Route::get('/home', [PostsController::class, 'index'])->name('posts.home');

//     //upload post
//     Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

//     //profile page
//     Route::get('/profile', [ProfilesController::class, 'showProfile'])->name('profile');

//     //like dislike
//     Route::post('/post/{post}/like', 'PostLikeController@like')->name('post.like');
//     Route::post('/post/{post}/dislike', 'PostLikeController@dislike')->name('post.dislike');

// });

// //posts
// Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
// Route::put('userData/{id}', [PostsController::class, 'update'])->name('posts.update');

// //likes
// Route::post('/toggle-like', [PostLikeController::class, 'toggleLike'])->name('posts.toggle-like');

// //comments
// Route::resource('comments', PostCommentsController::class)->only(['store', 'show', 'update', 'destroy']);

// //edit profile
// Route::post('/update-profile', [ProfilesController::class, 'updateProfile'])->name('updateProfile');

// //friend
// Route::get('/friends', [FriendsController::class, 'showFriends'])->name('show-friends');
// Route::post('/toggle-friend', [FriendsController::class, 'toggleFriend'])->name('toggle-friend');

// //view friend
// Route::get('/fetch-friends', [FriendsController::class, 'fetchFriends'])->name('fetch-friends');

// Route::get('/notification ', [PostsController::class, 'index'])->name('notification');

// //Archived Post
// Route::post('/archive', [ArchiveController::class, 'archive'])->name('archive');
// Route::post('/unarchive', [ArchiveController::class, 'unarchive'])->name('unarchive');