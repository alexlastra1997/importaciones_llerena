<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
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
Route::resource('suppliers', SupplierController::class);

//  Categorias
Route::resource('categories', CategoryController::class);

//Productos
Route::resource('products', ProductController::class);


//Ventas
Route::get('/venta', [VentaController::class,'index'])->name('venta');
Route::get('/sales', [SalesController::class,'index'])->name('sales');

//Cliente
Route::resource('clientes', ClienteController::class);

//Carrito
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('checkout', [CartController::class, 'completeCheckout'])->name('cart.completeCheckout');