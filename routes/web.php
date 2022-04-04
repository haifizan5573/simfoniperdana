<?php

use Illuminate\Support\Facades\Route;
use App\Models\FileUpload;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/index', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('livewire.dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/loan.php';
require __DIR__.'/user.php';
require __DIR__.'/product.php';
require __DIR__.'/surau.php';

Auth::routes();



Route::group(['middleware' => ['auth']], function() {

  Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->name('dashboard');
  Route::get('/', App\Http\Livewire\Dashboard::class)->name('dashboard');
  Route::get('/home', App\Http\Livewire\Dashboard::class)->name('home');

    Route::get('/modal/{id?}',App\Http\Livewire\Form\Modal::class)->name('modal');
    Route::get('/postcode',[App\Http\Livewire\API\Address::class,'postcode'])->name('postcode');
    Route::get('/location/{id?}',[App\Http\Livewire\API\Address::class,'location'])->name('location');

    Route::get('/employer',[App\Http\Livewire\API\Employers::class,'list'])->name('employer');

    Route::get('/productgroup',[App\Http\Livewire\API\Loan::class,'list'])->name('productgroup');
    Route::get('/productname/{id?}',[App\Http\Livewire\API\Loan::class,'productname'])->name('productname');

    Route::get('/tenure',[App\Http\Livewire\API\Loan::class,'tenure'])->name('tenure');
    Route::get('/status',[App\Http\Livewire\API\Loan::class,'status'])->name('status');

    Route::get('/listagent',[App\Http\Livewire\API\UserData::class,'listagent'])->name('listagent');
    Route::get('/rolelist/{type?}',[App\Http\Livewire\API\UserData::class,'rolelist'])->name('rolelist');

    Route::get('/viewattachment/{id}', function ($id) {
 
           $filedata=FileUpload::where('file_uploadsable_id',$id)->first();
           $data = [
          'img' => (!empty($filedata->path))?Storage::url($filedata->path):""
        
            ];

         
          $pdf = PDF::loadView('livewire.form.viewimage',['data' => $data]);
          return $pdf->stream('document.pdf');

      })->name('viewattachment');

    
});

    Route::get('/label/{type?}',[App\Http\Livewire\API\SystemData::class,'status'])->name('label');
    Route::get('/streetlist',[App\Http\Livewire\API\SystemData::class,'streetlist'])->name('streetlist');
    Route::get('/unitlist/{type?}',[App\Http\Livewire\API\SystemData::class,'unitlist'])->name('unitlist');
    Route::get('/numberlist/{number?}',[App\Http\Livewire\API\SystemData::class,'numberlist'])->name('numberlist');
    Route::get('/khairatkematian',App\Http\Livewire\Surau\Register::class)->name('khairatkematian');
    Route::get('/tahlil',App\Http\Livewire\Surau\Tahlil::class)->name('tahlil');
    Route::get('/form/{id}',App\Http\Livewire\Miscellaneous\Forms::class)->name('form');