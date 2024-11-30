<?php
//namespace App\Http\Middleware;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\DB;

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

Route::get('/login',[AuthController::class,'login'])->name('auth.login');

Route::get('/register',[AuthController::class,'register'])->name('auth.register');

Route::Post("/register",[AuthController::class,'store'])->name("auth.store");

Route::get('/' , [AuthController::class , 'index'])->name("HOME");

Route::Post("/login",[AuthController::class,'check'])->name("auth.check");

Route::post("/logout",[AuthController::class,"logout"])->name('auth.logout');

Route::get('/dashboard',[AuthController::class,'dashboard'])->middleware('isAdmin')->name('admin.dashboard');


//// category routes
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

Route::get('categories/create',[CategoryController::class,'create'])->middleware('isAdmin')->name('categories.create');

Route::Post("/categories",[CategoryController::class,'store'])->name("categories.store");

Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::put(	'/categories/{category}',[CategoryController::class,'update'])->middleware('isUser')->name('categories.update');

Route::get(	'/categories/edit/{category}',[CategoryController::class,'edit'])->middleware('isUser')->name('categories.edit');


//product routes


Route::resource('products',ProductController::class);

Route::resource('shops',ShopController::class)->middleware('isUser');

Route::get('Categories',[ShopController::class,'getCategories'])->name('CATEGORIES.INDEX')->middleware('isUser');

Route::get('categories/{category}/products',[ShopController::class,'getProductsByCategory'])->name('categories.products');

Route::get('/search',[ShopController::class,'getProductsByName'])->name('product.Search');

Route::get("/index", function () {
    $users=DB::select("select * from users");
    dd($users);
});