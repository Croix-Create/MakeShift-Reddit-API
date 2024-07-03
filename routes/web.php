<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;

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
Route::get('showPosts', [Controller::class, 'showPosts']);

Route::get('posts/index', [PostController::class,'index']);

Route::get('posts/create', [PostController::class,'create']);
Route::post('posts', [PostController::class, 'store']);

Route::get('posts/{post:id}/edit', [PostController::class, 'edit']);

Route::patch('admin/posts/{post:id}/', [PostController::class, 'update']);
Route::delete('admin/posts/{post:id}/', [PostController::class, 'destroy']);

