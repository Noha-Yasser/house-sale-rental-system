<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
<<<<<<< HEAD
use App\Models\Booking;
=======
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;


>>>>>>> cd29e97879ab12206c168035b7db69ef828c5793
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

<<<<<<< HEAD
      Route::resource('cities',CityController::class);
      Route::post('cities_update/{id}',[CityController::class,'update'])->name('cities
      _update');

=======
      
>>>>>>> cd29e97879ab12206c168035b7db69ef828c5793
      Route::resource('properties', PropertyController::class);
      Route::post('properties_update/{id}', [PropertyController::class , 'update'])->name('properties_update');
     
      Route::resource('reviews', ReviewController::class);
      Route::post('reviews_update/{id}', [ReviewController::class , 'update'])->name('reviews_update');


    Route::resource('companies', CompanyController::class);
     Route::post('companies_update/{id}',[CompanyController::class,'update'])->name('companies_update');

<<<<<<< HEAD
      Route::resource('customers', CustomerController::class);
     Route::post('customers_update/{id}',[CustomerController::class,'update'])->name('companies_update');


    Route::resource('bookings', BookingController::class);
     Route::post('bookings_update/{id}',[BookingController::class,'update'])->name('bookings_update');

Route::view('/home', 'dashboard.cms.index')->name('dashboard.home');
=======

    Route::resource('customers', CustomerController::class);
     Route::post('customers_update/{id}',[CustomerController::class,'update'])->name('customers_update');
     
    
     Route::resource('transactions', TransactionController::class);
     Route::post('transactions_update/{id}',[TransactionController::class,'update'])->name('transactions_update');
     
    Route::view('/home', 'dashboard.cms.index')->name('dashboard.home');

Route::delete('property-images/{id}', [PropertyController::class, 'destroyImage'])->name('property-images.destroy');

>>>>>>> cd29e97879ab12206c168035b7db69ef828c5793
});

Route::get('/admin/get-cities/{countryId}', [App\Http\Controllers\CityController::class, 'getCitiesByCountry']);

//  admins Route::view('/admin','cms.parent'); AdminController

// Route::get('/cms/admin', function () {
//     return view('welcome');
// });
