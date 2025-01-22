<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImagePostController;
use App\Http\Models\User;
Route::get('/', function () {
    return view('welcome');
})->name('start');
Route::middleware('auth')->group(function () {
    Route::get('/image-post/create', [ImagePostController::class, 'create'])->name('image-post.create');
    Route::post('/image-post/store', [ImagePostController::class, 'store'])->name('image-post.store');
    Route::get('/image-post',[ImagePostController::class,'display'])->name('image-post.show');
    //Route::get('/profile', [ImagePostController::class, 'show'])->name('profile.show'); // User profile with image posts
});

Route::middleware('auth')->group(function () {
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');

});

Route::get('/search', [UserController::class, 'search'])->name('search.profile');
Route::get('/profile/{user}', [UserController::class, 'show_profile'])->name('profile.showed');
Route::get('/search-users', [UserController::class, 'searchUsers'])->name('search.users');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $posts = $user->imagePosts()->latest()->get(); 
        $total_post_count = \App\Models\ImagePost::where('user_id', auth()->id())->count();
        $totalPostCount = $posts->count();
        return view('dashboard',compact('user','posts','total_post_count'));
    })->name('dashboard');
});
