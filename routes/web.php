<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes([
    'verify' => true,
    // 'register' => false
]);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
//___categories route___//
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');



Route::get('/password/change/', [HomeController::class, 'password_change'])->name('password.change')->middleware('verified');
Route::post('/password/update/', [HomeController::class, 'update_password'])->name('update.password')->middleware('verified');

//___subcategories route___//
Route::get('subcategory/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
Route::get('subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');



//___post Routes___//
Route::get('post/index', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('post/update/{id}', [PostController::class, 'update'])->name('post.update');





