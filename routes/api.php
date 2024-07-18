<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    // API Customers
    Route::apiResource('/customers', CustomerController::class);

    // API Invoices
    Route::apiResource('/invoices', InvoiceController::class);

    // Insert Multiple Data
    Route::post('/invoices/bulkStore', [InvoiceController::class, 'bulkStore'])->name('invoices.bulk.store'); 
});
