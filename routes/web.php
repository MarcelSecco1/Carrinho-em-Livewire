<?php

use App\Livewire\CadastrarProduto;
use App\Livewire\CartFinal;
use App\Livewire\Home;
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

Route::get('/', Home::class)
    ->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () { 
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('home');
// });

Route::get('/finalizar-cart', CartFinal::class)
    ->middleware('auth')
    ->name('cart.final');

Route::get('/cadastrar', CadastrarProduto::class)
    ->middleware('auth')
    ->name('create.product');
