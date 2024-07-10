<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoteController;


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

Route::get('/index', [PostController::class,'index']);

Route::get('showPosts', [Controller::class, 'showPosts']);

Route::get('posts/index', [PostController::class,'index']);

Route::get('posts/create', [PostController::class,'create']);
Route::post('/store', [PostController::class, 'store']);

Route::get('posts/{post:id}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post:id}/', [PostController::class, 'update']);

Route::delete('/posts/{post:id}/', [PostController::class, 'destroy']);

// threads

Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::post('components/post-comment/{comment:slug}/comments', [CommentController::class, 'thread']);


// sessions


Route::get('/sessions/create', [RegController::class, 'create']);
Route::post('/store', [RegController::class, 'store']);

Route::get('sessions/login', [SessionController::class,'create']);
Route::post('/store', [SessionController::class,'store']);


// vote

// Route for comment votes
Route::get('/comments/{id}/votes', [VoteController::class,'create']);

// Route for post votes
Route::get('/posts/{id}/votes', [VoteController::class,'create']);