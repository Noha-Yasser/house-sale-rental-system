<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
<<<<<<< HEAD
use App\Http\Controllers\CustomerController;
=======
use App\Http\Controllers\PropertyController;
>>>>>>> 96177d33d7accc89ce920c7de369683b233e11b9
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function(){
   Route::view('','dashboard.cms.parent');
   Route::view('temp','cms.temp');
   Route::resource('countries',CountryController::class);
   Route::post('countries_update/{id}',[CountryController::class,'update'])->name('countries _update');

<<<<<<< HEAD
   Route::resource('cities',CityController::class);
   Route::post('cities_update/{id}',[CityController::class,'update'])->name('cities _update');
 
  Route::resource('admins',AdminController::class);
   Route::post('admins_update/{id}',[AdminController::class,'update'])->name('admins_update');
=======
      Route::resource('cities',CityController::class);
      Route::post('cities_update/{id}',[CityController::class,'update'])->name('cities
      _update');
      
      Route::resource('properties', PropertyController::class);
>>>>>>> 96177d33d7accc89ce920c7de369683b233e11b9

    Route::resource('companies', CompanyController::class);
     Route::post('companies_update/{id}',[companyController::class,'update'])->name('companies_update');

      Route::resource('customers', CustomerController::class);
     Route::post('customers_update/{id}',[customerController::class,'update'])->name('companies_update');
});


//  admins Route::view('/admin','cms.parent'); AdminController

// Route::get('/cms/admin', function () {
//     return view('welcome');
// });
