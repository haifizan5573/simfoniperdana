<?php

Route::group(['middleware' => ['auth']], function() {


      
     
     Route::get('/productlist',[App\Http\Livewire\Loan\LoanProduct::class,'list'])->name('productlist');

     Route::group(['middleware' => ['role:Admin']], function () {
            
            Route::get('/product',App\Http\Livewire\Product\Productlist::class)->name('product');

            Route::get('/addproductgroup',App\Http\Livewire\Product\AddProductGroup::class)->name('addproductgroup');
            Route::get('/editproductgroup/{id}',App\Http\Livewire\Product\EditProductGroup::class)->name('editproductgroup');

            Route::get('/addproduct/{id}',App\Http\Livewire\Product\AddProduct::class)->name('addproduct');
            Route::get('/editproduct/{id}',App\Http\Livewire\Product\EditProduct::class)->name('editproduct');
            Route::get('/viewproductgroup/{id}',App\Http\Livewire\Product\ViewProduct::class)->name('viewproductgroup');
     });
});