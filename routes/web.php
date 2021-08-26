<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::post('/createpost', [PostController::class, 'createPost'])->name('createPost');
Route::get('/createpost', [PostController::class, 'seecreatePost'])->name('seecreatePost');

Route::group(['middleware' => ['editor:Moderator']], function() {   
    Route::get('/dashboard/{id}', [PostController::class, 'editpost'])->name('editpost');
    Route::post('/dashboard/{id}', [PostController::class, 'updatepost'])->name('updatepost');
    Route::delete('/dashboard/{id}', [PostController::class, 'destroy'])->name('destroy')->middleware(['owner']);
});

Route::group(['middleware' => ['modo:Admin']], function() {   
    Route::get('/admin', [UserController::class, 'index'])->name('getusers');
    Route::get('/admin/{id}', [UserController::class, 'show'])->name('showuser');
    Route::post('/admin/{id}', [UserController::class, 'update'])->name('updateuser');
    Route::delete('/admin/{id}', [UserController::class, 'destroy'])->name('destroyuser');
});

Route::get('/dashboard', function () {
    $posts = Post::get();	  
    return view('dashboard')->with('posts', $posts);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
