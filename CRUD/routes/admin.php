<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\cursoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\UserController;

route::get('', [homeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

route::resource('users',UserController::class)->only(['index','edit','update'])->names('admin.users');

route::resource('roles',RoleController::class)->names('admin.roles');

route::resource('categories',categoryController::class)->except('show')->names('admin.categories');

route::resource('cursos',cursoController::class)->names('admin.cursos');

