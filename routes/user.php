<?php

Route::group(['middleware' => ['auth']], function() {


 Route::get('/userlist',App\Http\Livewire\User\UserList::class)->name('userlist');
 Route::get('/updateuser',[App\Http\Livewire\User\UserList::class,'updateuser'])->name('updateuser');
 Route::get('/adduser',App\Http\Livewire\User\Adduser::class)->name('adduser');
 Route::get('/edituser/{uid}',App\Http\Livewire\User\Edituser::class)->name('edituser');

 //Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('/showprofile',App\Http\Livewire\User\Userprofile::class)->name('showprofile');
Route::get('/editprofile',App\Http\Livewire\User\EditProfile::class)->name('editprofile');
Route::get('/userprofile/{uid}',App\Http\Livewire\User\Userprofile::class)->name('userprofile');
});