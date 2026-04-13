<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function(){
   Route::view('','dashboard.cms.parent');
   Route::view('temp','cms.temp');
   Route::resource('countries',CountryController::class);
   Route::post('countries_update/{id}',[CountryController::class,'update'])->name('countries
   _update');

      Route::resource('cities',CityController::class);
   Route::post('cities_update/{id}',[CityController::class,'update'])->name('cities
   _update');

});
//  Route::view('/admin','cms.parent');

// Route::get('/cms/admin', function () {
//     return view('welcome');
// });
