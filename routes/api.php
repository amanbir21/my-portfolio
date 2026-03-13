<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectViewController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Controllers\Api\AdminAuthController;
// Public projects for frontend Vue page
Route::get('/project', [ProjectViewController::class, 'index']); 



// Admin authentication
// --------------------
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// --------------------
// Protected admin routes
// --------------------
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/projects/admin', [ProjectController::class, 'index']); // admin listing
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
});
//Route::post('/projects',[ProjectController::class,'store']);

//Route::delete('/projects/{id}',[ProjectController::class,'destroy']);

Route::post('/contact', function(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);
    
    Mail::to('amanuelcompa55@gmail.com')->send(new ContactMail($request->name, $request->message));

    return response()->json(['message' => 'Email sent successfully!']);
});