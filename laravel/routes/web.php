<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MainController;
use App\helpers\CitySlug;

// Route::get('/animal', [AnimalController::class, 'animal'])->name('animal.index');
// Route::get('/animal/create', [AnimalController::class, 'create'])->name('animal.create');
// Route::post('/animal', [AnimalController::class, 'store'])->name('animal.store');
// Route::get('/animal/{animal}', [AnimalController::class, 'show'])->name('animal.show');
// Route::get('/animal/{animal}/edit', [AnimalController::class, 'edit'])->name('animal.edit');
// Route::patch('/animal/{animal}', [AnimalController::class, 'update'])->name('animal.update');
// Route::delete('/animal/{animal}', [AnimalController::class, 'destroy'])->name('animal.delete');
// Route::get('/animal/update', [AnimalController::class, 'update']);

Route::get('/reset', function(){
    session()->forget('city');
    return redirect()->route('index');
})->name('reset');


Route::prefix(CitySlug::getSlug())->middleware('city')->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/news', [MainController::class, 'news'])->name('news');  
    Route::get('/news/create', [MainController::class, 'create_news'])->name('create_news');   
    Route::post('/news', [MainController::class, 'store_news'])->name('store_news');
    Route::get('/news/{news}', [MainController::class, 'show_news'])->name('show_news');
    Route::get('/news/{news}/edit', [MainController::class, 'edit_news'])->name('edit_news');
    Route::patch('/news/{news}', [MainController::class, 'update_news'])->name('update_news');
    Route::delete('/news/{news}', [MainController::class, 'destroy_news'])->name('destroy_news');
}); 