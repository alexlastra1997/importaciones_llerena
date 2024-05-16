<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
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


//---------Autenticacion---------------

//login
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/', [LoginController::class,'store']);

//registro
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

//Logout
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

//---------Paginas---------------

//Dashboard
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//Perfil
Route::get('/profile', [ProfileController::class,'index'])->name('profile');

// Usuarios
Route::get('/users', [UserController::class,'index'])->name('users');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');

//Proveedores
Route::get('/suppliers', [SuppliersController::class,'index'])->name('suppliers');

//Productos
Route::get('/products', [ProductsController::class,'index'])->name('products');

//Productos
Route::get('/sales', [SalesController::class,'index'])->name('sales');
