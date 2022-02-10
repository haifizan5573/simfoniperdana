<?php

Route::group(['middleware' => ['auth']], function() {


    Route::group(['middleware' => ['can:app-list']], function () {
        Route::get('/applist/{id?}', App\Http\Livewire\Loan\AddLoan::class)->name('applist');
    });
   
    Route::group(['middleware' => ['can:app-create']], function () {
        Route::get('/addapp/{id?}', App\Http\Livewire\Loan\AddLoan::class)->name('addapp');
        Route::get('/addappgen/{id?}', App\Http\Livewire\Loan\AddLoan::class)->name('addappgen');
    });
       
    
     Route::get('/productlist',[App\Http\Livewire\Loan\LoanProduct::class,'list'])->name('productlist');

});