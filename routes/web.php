<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function(){
   Route::view('','dashboard.cms.parent');
   Route::view('temp','cms.temp');
   Route::resource('countries',CountryController::class);
   Route::post('countries_update/{id}',[CountryController::class,'update'])->name('countries _update');


   Route::resource('cities',CityController::class);
   Route::post('cities_update/{id}',[CityController::class,'update'])->name('cities _update');
 
  Route::resource('admins',AdminController::class);
   Route::post('admins_update/{id}',[AdminController::class,'update'])->name('admins_update');

      
      Route::resource('properties', PropertyController::class);
      Route::post('properties_update/{id}', [PropertyController::class , 'update'])->name('properties_update');
     
      Route::resource('reviews', PropertyController::class);
      Route::post('reviews_update/{id}', [PropertyController::class , 'update'])->name('reviews_update');


    Route::resource('companies', CompanyController::class);
     Route::post('companies_update/{id}',[CompanyController::class,'update'])->name('companies_update');


     Route::resource('customers', CustomerController::class);
     Route::post('customers_update/{id}',[customerController::class,'update'])->name('companies_update');
    
     Route::resource('transactions', TransactionController::class);
     Route::post('transactions_update/{id}',[TransactionController::class,'update'])->name('transactions_update');
     
      Route::view('/home', 'dashboard.cms.index')->name('dashboard.home');

});


//  admins Route::view('/admin','cms.parent'); AdminController

// Route::get('/cms/admin', function () {
//     return view('welcome');
// });
