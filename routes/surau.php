<?php

Route::group(['middleware' => ['auth']], function() {


    Route::get('/khairat',App\Http\Livewire\Surau\KhairatData::class)->name('khairat');
    Route::get('/activities',App\Http\Livewire\Surau\Activities::class)->name('activities');
    Route::get('/activitycategory',App\Http\Livewire\Surau\CategoryList::class)->name('activitycategory');
    Route::get('/formlist',App\Http\Livewire\Surau\FormList::class)->name('formlist');
    Route::get('/formuser/{formid}', App\Http\Livewire\Surau\FormUsers::class)->name('formuser');

    Route::get('/fund', App\Http\Livewire\Surau\FundList::class)->name('fund');
    Route::get('/settlement/{fundid}', App\Http\Livewire\Surau\Settlement::class)->name('settlement');
   
    Route::post('/paystatus', App\Http\Livewire\Surau\PayStatus::class)->name('paystatus');
    Route::get('/paystatus', App\Http\Livewire\Surau\PayStatus::class)->name('paystatus');

    Route::group(['middleware' => ['can:update-khairat']], function () {
         Route::get('/summary',App\Http\Livewire\Surau\KhairatSummary::class)->name('summary');
    });

    Route::get('/contribution/{catid}', App\Http\Livewire\Surau\ContributorPage::class)->name('contribution');

    Route::group(['middleware' => ['can:add-activities']], function () {
        Route::get('/addactivitysurau',App\Http\Livewire\Surau\AddActivity::class)->name('addactivitysurau');
        Route::get('/addformsurau',App\Http\Livewire\Surau\AddForm::class)->name('addformsurau');
   });
});

Route::get('/surauactivity/{actid}',App\Http\Livewire\Surau\ActivityPage::class)->name('surauactivity');
