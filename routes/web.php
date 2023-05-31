<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{livro}', [LivroController::class, 'show'])->name('livros.show');
Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');
Route::put('/livros/{livro}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');
