<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthentificationController;


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

Route::get('/register', [AuthentificationController::class, 'showAccount'])->name('account');
Route::post('/registerUser', [AuthentificationController::class, 'creatAccount'])->name('accountCreat');

Route::get('/', [AuthentificationController::class, 'index'])->name('home');
Route::post('/login', [AuthentificationController::class, 'login'])->name('login');  





Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::post('/books', [BookController::class, 'index'])->name('book.index');


Route::get('/library', [BookController::class, 'library'])->name('book.library');
Route::get('/{id}', [BookController::class, 'show'])->name('book.show');


Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::get('/create', [BookController::class, 'create'])->name('book.create');
Route::get('/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/{id}', [BookController::class, 'destroy'])->name('book.destroy');

Route::post('/{id}', [ReservationController::class, 'store'])->name('reservation.store');
