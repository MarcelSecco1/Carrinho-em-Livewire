<?php

use App\Livewire\CadastrarProduto;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () { 
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('home');
// });


Route::get('/cadastrar', CadastrarProduto::class)
    ->middleware('auth')
    ->name('upload');