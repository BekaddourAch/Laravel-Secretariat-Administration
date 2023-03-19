<?php

use App\Http\Controllers\ArriveController;
use App\Http\Controllers\BordereauController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatesController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ParamsController;
use App\Http\Controllers\PhonesController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('pages.dashboard');
// })->name('index');
Route::resource('/', DashboardController::class);
Route::resource('todo', TodoController::class);
// Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
//  Route::delete('todo/{id}', [TodoController::class,'destroy']);
Route::resource('cour_arrivee', ArriveController::class);
Route::resource('cour_depart', DepartController::class);
Route::resource('bordereaux', BordereauController::class);
Route::resource('contacts', ContactsController::class);
Route::get('contacts1', [ContactsController::class,"index1"]);
Route::resource('phones', PhonesController::class);
Route::resource('date', DatesController::class);
Route::resource('employee', EmployeesController::class);
Route::get('parameters/all', [ParamsController::class,'index']);

Route::post('parameters/store-type', [ParamsController::class,'storeType']); 
Route::post('parameters/store-bureau', [ParamsController::class,'storeBureau']);
Route::delete('parameters/delete-type/{id}', [ParamsController::class,'deleteType']); 
Route::delete('parameters/delete-bureau/{id}', [ParamsController::class,'deleteBureau']);
// Route::resource('parameters', ParamsController::class);


// Route::get('showpdf/{id}', [ArriveController::class,'showpdf']);

// Route::get('/show-pdf/{id}', function($id) {
//     $file = Arrivee::findOrFail($id);
//     echo storage_path('app\public\uploads\\').'1666124631_DGR_18.10.2022-1666078064.pdf';
//     // return response()->download(storage_path('app\public\uploads\\').'1666124631_DGR_18.10.2022-1666078064.pdf');
// })->name('show-pdf');