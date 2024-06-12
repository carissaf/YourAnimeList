<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin/animes', [AdminController::class, 'show_allanimes'])->name('admin_animes');
    Route::delete('/delete_anime', [AnimeController::class, 'delete_anime'])->name('delete_anime');
    Route::get('/edit_anime/{anime_id}', [AnimeController::class, 'edit_anime_page'])->name('edit_anime_page');
    Route::patch('/edit', [AnimeController::class, 'edit_anime'])->name('edit_anime');
    Route::get('/add_anime_page', [AnimeController::class, 'add_anime_page'])->name('add_anime_page');
    Route::post('/add_anime', [AnimeController::class, 'add_anime'])->name('add_anime');
    Route::get('/admin/animes_search', [AnimeController::class, 'admin_search_anime'])->name('admin_search_anime');
    Route::delete('/delete_rating', [RatingController::class, 'delete_rating'])->name('delete_rating');
});

//ADMIN & USER
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [UserController::class, 'home_page'])->name('home_page');

    Route::get('/profile/{user_id}', [UserController::class, 'profile_page'])->name('profile_page');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/edit_profile/{user_id}', [UserController::class, 'edit_profile_page'])->name('edit_profile_page');
    Route::patch('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/change_password_page', [UserController::class, 'change_password_page'])->name('change_password_page');
    Route::patch('/change_password', [UserController::class, 'change_password'])->name('change_password');

    Route::get('/edit_profile/{user_id}', [UserController::class, 'edit_profile_page'])->name('edit_profile_page');
    Route::patch('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/change_password_page', [UserController::class, 'change_password_page'])->name('change_password_page');
    Route::patch('/change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::get('/animes', [AnimeController::class, 'show_allanimes'])->name('animes');
    Route::get('animes/{anime_id}', [AnimeController::class, 'anime_detail_page'])->name('anime_detail');
    Route::get('add_rating_page/{anime_id}', [RatingController::class, 'add_rating_page'])->name('add_rating_page');
    Route::post('add_rating', [RatingController::class, 'add_rating'])->name('add_rating');
    Route::get('/animes_search', [AnimeController::class, 'search_anime'])->name('search_anime');
    Route::get('/ratings', [RatingController::class, 'show_allratings'])->name('ratings');
});

//GUEST
Route::get('/', [UserController::class, 'register_page'])->name('register_page');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login_page', [UserController::class, 'login_page'])->name('login_page');
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::get('/home', [UserController::class, 'home_page'])->name('home_page');

// Route::get('/profile/{user_id}', [UserController::class, 'profile_page'])->name('profile_page');

// Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::get('/edit_profile/{user_id}', [UserController::class, 'edit_profile_page'])->name('edit_profile_page');
// Route::patch('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');
// Route::get('/change_password_page', [UserController::class, 'change_password_page'])->name('change_password_page');
// Route::patch('/change_password', [UserController::class, 'change_password'])->name('change_password');

//ANIMES
// Route::get('/animes', [AnimeController::class, 'show_allanimes'])->name('animes');
// Route::get('animes/{anime_id}', [AnimeController::class, 'anime_detail_page'])->name('anime_detail');
// Route::get('add_rating_page/{anime_id}', [RatingController::class, 'add_rating_page'])->name('add_rating_page');
// Route::post('add_rating', [RatingController::class, 'add_rating'])->name('add_rating');
// Route::get('/animes_search', [AnimeController::class, 'search_anime'])->name('search_anime');

// Route::delete('/delete_anime', [AnimeController::class, 'delete_anime'])->middleware(['auth', 'isAdmin'])->name('delete_anime');
// Route::get('/edit_anime/{anime_id}', [AnimeController::class, 'edit_anime_page'])->middleware(['auth', 'isAdmin'])->name('edit_anime_page');
// Route::patch('/edit', [AnimeController::class, 'edit_anime'])->middleware(['auth', 'isAdmin'])->name('edit_anime');

//RATINGS
// Route::get('/ratings', [RatingController::class, 'show_allratings'])->name('ratings');

