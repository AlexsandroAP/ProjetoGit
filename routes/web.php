<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('ListarProduto');
})->middleware(['auth', 'verified'])->name('ListarProduto');

Route::get('/ListarProduto', [ProdutoController::class, 'index'])->name('produtos.index');

Route::get('/cadastrar', function () {
    return view('lista');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cadastre', function () {
    return view('cadastre');
})->name('cadastre');

require __DIR__.'/auth.php';
