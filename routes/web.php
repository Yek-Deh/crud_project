<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customers.trash');
Route::get('customers/restore/{customer}', [CustomerController::class, 'restore'])->name('customers.restore');
Route::delete('customers/force_delete/{customer}', [CustomerController::class, 'force_delete'])->name('customers.force_delete');
Route::resource('customers', CustomerController::class);
