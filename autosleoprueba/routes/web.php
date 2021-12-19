<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Livewire\Municipalities;
use App\Models\municipality;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/register',[MunicipalityController::class,'create']);
Route::get('/registro',Municipalities::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
