<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// Ta vendo essa rota aqui? ela ta fora do middleware auth, q é qm faz verificar se ta logado




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       
    //Produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{produtos}', [ProdutoController::class, 'show'])->name('produtos.show');
    Route::get('/produtos/{produtos}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{produtos}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{produtos}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

});

require __DIR__.'/auth.php';
