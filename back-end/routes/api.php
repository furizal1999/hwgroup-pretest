<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\API\HandleCategoriesController::class)->group(function (){
    Route::get('/getcategories', 'getCategories');
    Route::post('/addcategories', 'addCategories');
    Route::put('/updatecategories/{id}', 'updateCategories');
    Route::delete('/deletecategories/{id}', 'deleteCategories');
});

Route::controller(App\Http\Controllers\API\HandleLoansController::class)->group(function (){
    Route::get('/getloans', 'getLoans');
    Route::post('/addloans', 'addLoans');
    Route::put('/updateloans/{id}', 'updateLoans');
    Route::delete('/deleteloans/{id}', 'deleteLoans');
});
