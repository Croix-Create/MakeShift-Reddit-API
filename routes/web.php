<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegController;

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


Route::get('/', [Controller::class, 'showPosts'])->name('home');

// posts

Route::get('showPosts', [Controller::class, 'showPosts']);

Route::get('posts/index', [PostController::class,'index']);

Route::get('posts/create', [PostController::class,'create']);
Route::post('/store', [PostController::class, 'store']);

Route::get('posts/{post:id}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post:id}/', [PostController::class, 'update']);

Route::delete('/posts/{post:id}/', [PostController::class, 'destroy']);

// sessions


Route::get('/sessions/create', [RegController::class, 'create']);
Route::post('/store', [RegController::class, 'store']);

