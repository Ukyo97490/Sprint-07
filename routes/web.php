<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\commentsCRUDController;
use App\Http\Controllers\forumMoviesCRUDController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\userController;

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


Route::resource('movies', forumMoviesCRUDController::class);
Route::resource('comments', commentsCRUDController::class);
Route::resource('users', userController::class);

Route::get('edit', [commentsCRUDController::class, 'edit']) -> name('edit');

Route::get('/', [forumMoviesCRUDController::class, 'home']);
Route::get('home/{genre?}', [forumMoviesCRUDController::class, 'home']) -> name('home');
// Route::get('homeGenre/{genre}', [forumMoviesCRUDController::class, 'homeGenre']) -> name('homeGenre');
Route::get('create', [forumMoviesCRUDController::class , 'create']) -> name('create');
Route::get('edit', [forumMoviesCRUDController::class , 'edit']) -> name('edit');
Route::get('updateLikePlus/{id}', [forumMoviesCRUDController::class , 'updateLikePlus']) -> name('updateLikePlus');
Route::get('updateLikeMoins/{id}', [forumMoviesCRUDController::class , 'updateLikeMoins']) -> name('updateLikeMoins');

Route::get('editComment', [searchController::class , 'editComment']) -> name('editComment');
Route::get('searchMovie', [searchController::class , 'search']) -> name('search');
Route::get('detailMovie', [searchController::class , 'detailMovie']) -> name('detailMovie');

Route::get('register', [userController::class, 'register'])->name('register');
Route::post('register', [userController::class, 'register_action'])->name('register.action');
Route::get('login', [userController::class, 'login'])->name('login');
Route::post('login', [userController::class, 'login_action'])->name('login.action');
Route::get('changePersoInfos', [userController::class, 'changePersoInfos'])->name('changePersoInfos');
Route::post('changePersoInfos', [userController::class, 'changePersoInfos_action'])->name('changePersoInfos.action');
Route::get('logout', [userController::class, 'logout'])->name('logout');
Route::get('users', [userController::class, 'users'])->name('users');
Route::get('searchUser', [userController::class, 'searchUser'])->name('searchUser');
Route::get('detailUser', [userController::class, 'detailUser'])->name('detailUser');



