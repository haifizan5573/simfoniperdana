<?php

Route::group(['middleware' => ['auth']], function() {


    Route::get('/khairat',App\Http\Livewire\Surau\KhairatData::class)->name('khairat');
    Route::get('/formlist',App\Http\Livewire\Surau\FormList::class)->name('formlist');
    Route::get('/formuser/{formid}', App\Http\Livewire\Surau\FormUsers::class)->name('formuser');

});