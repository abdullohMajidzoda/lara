<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyFirstController;

use App\Http\Controllers\PostController; 
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\MainController; 

Route::get('/me',function(){
    return 'this is me';
});

Route::get('/first', [MyFirstController::class,'index']);

Route::get('/post', [PostController::class,'index'])->name('post.index');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/{gushlaqa}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{gushlaqa}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{gushlaqa}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{gushlaqa}', [PostController::class, 'destroy'])->name('post.delete');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/post/update', [PostController::class, 'update']);
Route::get('/post/student/{r}', [PostController::class, 'student']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');