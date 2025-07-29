<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\LikeApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\QueryController;


Route::get('/', function () {
    return redirect('/login');
});




Route::get('/', function () {
    return view('landing.landing');
})->name('landing');



Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store']);
     Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
});


Route::get('/api/comments/{post}', [CommentApiController::class, 'getComments']);
Route::post('/api/comments', [CommentApiController::class, 'store']);

Route::post('/api/like/toggle', [LikeApiController::class, 'toggle']);
Route::get('/api/like/status', [LikeApiController::class, 'status']);

Route::post('/follow-toggle', [FollowController::class, 'toggle']);
Route::get('/follow-count/{user}', [FollowController::class, 'count']);
Route::get('/followers/{user}', [FollowController::class, 'followersList']);
Route::get('/following/{user}', [FollowController::class, 'followingList']);
Route::post('/follow/accept/{fromUser}', [FollowController::class, 'accept'])->name('follow.accept');
Route::post('/follow/reject/{fromUser}', [FollowController::class, 'reject'])->name('follow.reject');

Route::get('/notifikasi', [NotificationController::class, 'index'])->middleware('auth')->name('notifikasi.index');


Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::delete('/friends/{friend}', [FriendController::class, 'destroy'])->name('friends.destroy');
Route::get('/chat/{friend}', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
Route::get('/chat', [ChatController::class, 'history'])->name('chat.history');

// web.php
Route::get('/friends/search', [\App\Http\Controllers\FriendController::class, 'search'])->name('friends.search');


Route::post('/share', [App\Http\Controllers\ShareController::class, 'store'])->name('share.store');


Route::delete('/post/{post}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');




// Story Route
Route::middleware('auth')->group(function() {
    Route::get('/story', [StoryController::class, 'index'])->name('story.index');
    Route::post('/story/store', [StoryController::class, 'store'])->name('story.store');
    Route::post('/story/like', [StoryController::class, 'toggleLike'])->name('story.like');
    Route::get('/story-like/status/{id}', [StoryController::class, 'likeStatus']);
    Route::post('/story/comment', [StoryController::class, 'comment'])->name('story.comment');
    Route::delete('/story/{story}', [StoryController::class, 'destroy'])->name('story.destroy');
});


Route::get('/tes-query', [QueryController::class, 'generateQuery500']);

