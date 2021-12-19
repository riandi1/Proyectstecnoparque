<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cursoController;
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

Route::get('/',[cursoController::class, 'index'])->name('cursos.index');
Route::get('cursos/{curso}',[cursoController::class, 'show'])->name('cursos.show');

Route::get('category/{category}',[cursoController::class, 'category'])->name('cursos.category');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
