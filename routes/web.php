<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Models\BlogPost;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'blog'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('/register', [AuthController::class, 'registration'])->name('register');
    Route::post('/register', [AuthController::class,'postRegistration'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [BlogPostController::class,'index'])->name('home');
    Route::get('/{id}', [BlogPostController::class, 'show']);
    Route::get('/create/post',[BlogPostController::class, 'create']);
    Route::post('/create/post', [BlogPostController::class, 'store']);
    Route::get('/{blogPost}/edit', [BlogPostController::class, 'edit']);
    Route::put('/{blogPost}/edit', [BlogPostController::class, 'update']);
    Route::delete('/{blogPost}',[BlogPostController::class, 'destroy']);
    
});


Route::prefix('admin')->middleware('auth','is_admin')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');
    Route::post('/show',[AdminController::class,'show'])->name('admin.show');

});