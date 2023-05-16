<?php

Route::group(['middleware' => ['auth']], function() {


 Route::get('/resident/{streetfilter?}',App\Http\Livewire\Simfoni\Resident::class)->name('resident');
 Route::get('/OrgChart/jmb',App\Http\Livewire\OrgChart\JMB::class)->name('jmb');


});