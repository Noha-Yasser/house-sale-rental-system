<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin/')->group(function(){
   Route::view('','cms.parent');
   Route::view('temp','cms.temp');
});
//  Route::view('/admin','cms.parent');

// Route::get('/cms/admin', function () {
//     return view('welcome');
// });
