<?php

Route::group(['middleware' => ['auth']], function() {


    Route::get('/khairat',App\Http\Livewire\Surau\KhairatData::class)->name('khairat');


});