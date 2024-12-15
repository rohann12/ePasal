<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;


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



Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource("product", ProductController::class);
    Route::resource("category", CategoryController::class);

    Route::view('admin', 'admin.dashboard')->name("admin");
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    

Route::get('/', [WebController::class, 'index'])->name('index'); // Home page
Route::get('/category/{categoryId}', [WebController::class, 'filterByCategory'])->name('category'); // Filter by category
Route::get('/details/{id}', [WebController::class, 'showProduct'])->name('details'); // Product details
Route::post('/cart/add/{id}', [WebController::class, 'addToCart'])->name('cart.add'); // Add to cart
Route::get('/cart', [WebController::class, 'showCart'])->name('cart'); // Show cart
Route::delete('/cart/remove/{id}', [WebController::class, 'removeFromCart'])->name('cart.remove'); // Remove from cart
Route::get('/checkout', [WebController::class, 'checkout'])->name('checkout'); // Checkout page
Route::post('/checkout', [WebController::class, 'placeOrder'])->name('order.place'); // Place order
Route::get('/categories', [WebController::class, 'categories'])->name('categories');

Route::get('/category/{categoryId}/products', [WebController::class, 'categoryProducts'])->name('category.products');
Route::view('/contact','web.contact')->name('contact');
