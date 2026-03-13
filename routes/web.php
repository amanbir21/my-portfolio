<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::post('/admin/login',[AdminAuthController::class,'login']);
//Route::get('/', function () {
   // return ['Laravel' => app()->version()];
//});
Route::get('/{any}', function () {
    return view('app'); // This should return your SPA index page
})->where('any', '.*');

require __DIR__.'/auth.php';
