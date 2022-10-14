<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
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
    if (auth()->user()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
})->name('default');

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::get('/post/view/{post}', [PostController::class, 'view'])->name('post.view');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('isAdmin');

    Route::group(['prefix'=>'/post', 'as'=>'post.'], function(){
        Route::get('/create', [PostController::class, 'create'])->name('create')->middleware('isAdmin', 'isAuthor');
        Route::post('/store', [PostController::class, 'store'])->name('store')->middleware('isAdmin', 'isAuthor');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit')->middleware('isAdmin', 'isAuthor');
        Route::post('/update/{post}', [PostController::class, 'update'])->name('update')->middleware('isAdmin', 'isAuthor');
        Route::get('hide/{post}', [PostController::class, 'hide'])->name('hide')->middleware('isAdmin');
    });

    Route::group(['middleware' => ['isAdmin', 'isAuthor']], function () {
        Route::group(['prefix'=>'/comment', 'as'=>'comment.'], function(){
            Route::post('/store/{post}', [CommentController::class, 'store'])->name('store');
            Route::get('/hide/{comment}/{post}', [CommentController::class, 'hide'])->name('hide');
        });
    });

});

require __DIR__ . '/auth.php';
