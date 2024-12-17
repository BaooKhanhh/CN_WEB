<?php

use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\URL;

//URL::forceScheme('https');

Route::get('/', [SalesController::class, 'index'])->name('sales.index');


Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');




// adds a sale to the database
Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');

// returns a page that shows a full sale
Route::get('/sales/{sale}', [SalesController::class, 'show'])->name('sales.show');

// returns the form for editing a sale
Route::get('/sales/{sale}/edit', [SalesController::class, 'edit'])->name('sales.edit');

// updates a sale
Route::put('/sales/{sale}', [SalesController::class, 'update'])->name('sales.update');

// deletes a sale
Route::delete('/sales/{sale}', [SalesController::class, 'destroy'])->name('sales.destroy');

