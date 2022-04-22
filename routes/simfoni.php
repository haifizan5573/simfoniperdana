<?php

Route::group(['middleware' => ['auth']], function() {


 Route::get('/resident',App\Http\Livewire\Simfoni\Resident::class)->name('resident');
;
});