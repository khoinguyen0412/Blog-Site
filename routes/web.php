<?php

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
    Route::get('/', [BlogPostController::class,'index']);
    Route::get('/{id}', [BlogPostController::class, 'show']);
    Route::get('/create/post',[BlogPostController::class, 'create']);
    Route::post('/create/post', [BlogPostController::class, 'store']);
    Route::get('/{blogPost}/edit', [BlogPostController::class, 'edit']);
    Route::put('/{blogPost}/edit', [BlogPostController::class, 'update']);
    Route::delete('/{blogPost}',[BlogPostController::class, 'destroy']);
    
});
