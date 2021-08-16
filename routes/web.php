<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;


Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('/');

Route::get('/about', [CustomersController::class, 'about'])->name('about');

Route::get('contact', [ContactFormController::class, 'create'])->name('contact.create');

Route::post('contact', [ContactFormController::class, 'store'])->name('contact.store');



Route::get('customers', [CustomersController::class, 'index'])->name('customers.index');

Route::get('customers/create', [CustomersController::class, 'create'])->name('customers.create');

Route::post('customers', [CustomersController::class, 'store'])->name('customers.store'); 

Route::get('customers/{customer}', [CustomersController::class, 'show'])->name('customers.show'); 

Route::get('customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit'); 

Route::patch('customers/{customer}', [CustomersController::class, 'update'])->name('customers.update'); 

Route::delete('customers/{customer}', [CustomersController::class, 'destroy'])->name('customers.destroy'); 


// Route::resource('customers', CustomersController::class); z
// Route::resources('customers', [CustomersController::class])->middleware('auth'); 


