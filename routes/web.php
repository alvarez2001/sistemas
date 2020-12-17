<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::post('logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('home', [HomeController::class, 'index'])->name('homeAdmin');


Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/{usuario}/editar', [UsuarioController::class, 'showFormEdit'])->name('usuarios.showFormEdit');
Route::get('usuarios/crear', [UsuarioController::class, 'showFormCrear'])->name('usuarios.showFormCrear');

Route::post('usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear');
Route::get('usuarios/listar', [UsuarioController::class, 'listar'])->name('usuarios.listar');
Route::put('usuarios/{usuario}/actualizar', [UsuarioController::class, 'actualizar'])->name('usuarios.actualizar');
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');



Route::get('proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');