<?php

Route::group(['middleware' => ['auth']], function() {


 Route::get('/userlist',App\Http\Livewire\User\UserList::class)->name('userlist');
 Route::get('/adduser',App\Http\Livewire\User\UserList::class)->name('adduser');
 Route::get('/edituser/{uid}',App\Http\Livewire\User\UserList::class)->name('edituser');

});