<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route Hooks - Do not delete//
	Route::view('computadoras', 'livewire.computadoras.index')->name('computadoras')->middleware('auth');
	Route::view('empleados', 'livewire.empleados.index')->name('empleados')->middleware('auth');