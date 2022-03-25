<?php

Route::group(['middleware' => ['auth']], function() {


    Route::group(['middleware' => ['can:app-list']], function () {
        Route::get('/applist/{id?}', App\Http\Livewire\Loan\ApplicationList::class)->name('applist');
        Route::get('/viewapp/{appid?}', App\Http\Livewire\Loan\ViewApplication::class)->name('viewapp');
    });
   
    Route::group(['middleware' => ['can:app-create']], function () {
        Route::get('/addapp/{id?}', App\Http\Livewire\Loan\AddLoan::class)->name('addapp');
        Route::get('/addappgen/{id?}', App\Http\Livewire\Loan\AddLoan::class)->name('addappgen');
    });
       
    
     Route::get('/productlist',[App\Http\Livewire\Loan\LoanProduct::class,'list'])->name('productlist');
   

});