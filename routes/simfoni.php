<?php

Route::group(['middleware' => ['auth']], function() {


 Route::get('/resident/{streetfilter?}',App\Http\Livewire\Simfoni\Resident::class)->name('resident');
;
});