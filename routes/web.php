<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/', [BukuController::class, 'indexPublic'])->name('buku.public.index');
Route::get('/books/{id}', [BukuController::class, 'showPublic'])->name('buku.public.show');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/books/index', [BukuController::class, 'index'])->name('contacts.index');
    Route::get('/book/{id}/edit', [BukuController::class, 'edit'])->name('contacts.edit');
    Route::post('/book/{id}/update', [BukuController::class, 'update'])->name('contacts.update');
    Route::get('/book/{id}/destroy', [BukuController::class, 'destroy'])->name('contacts.destroy');  
    Route::get('/book/create', [BukuController::class, 'create'])->name('contacts.create');
    Route::post('/book/store', [BukuController::class, 'store'])->name('contacts.store');
    Route::resource('buku', BukuController::class);

});
