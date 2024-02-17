<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('users.dashboard');
// })->name('/');

Route::controller(App\Http\Controllers\Users\LoginController::class)->group(function (){
    Route::get('/', 'index')->name("/");
    Route::post('users/register', 'register')->name("users.register");
    Route::post('users/login', 'login')->name("users.login");
});

Route::controller(App\Http\Controllers\Users\DashboardController::class)->group(function (){
    Route::get('dashboard', 'index')->name("users.dashboard");
});

// Route::controller(App\Http\Controllers\tu\UniversityController::class)->middleware("checkuseraccess", "checkuseraccesstu")->group(function (){
//     Route::get('/tu/datamaster/university', 'index')->name("datamaster.university");
//     Route::post('/tu/datamaster/inputuniversity', 'inputUniversity')->name("datamaster.university.input");
//     Route::post('/tu/datamaster/deleteuniversity', 'deleteUniversity')->name("datamaster.university.delete");
//     Route::post('/tu/datamaster/updateuniversity', 'updateUniversity')->name("datamaster.university.update");
// });