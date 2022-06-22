<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin_room_911','permission:access room 911', 'auth']], function () {
    Route::post('/create_access', [App\Http\Controllers\AccessController::class, 'create_access'])->name('create_access');
    Route::get('/room_911', [App\Http\Controllers\AccessController::class, 'index'])->name('authorization');
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/import_csv', [App\Http\Controllers\ImportController::class, 'index'])->name("import");
    Route::post('/upload-content',[App\Http\Controllers\ImportController::class,'uploadContent'])->name('import_employees');
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
    Route::resource('employee', App\Http\Controllers\EmployeeController::class);
    Route::get('/history/{id}/emp', [App\Http\Controllers\HistoryController::class, 'history']);
    Route::post('change_access', [App\Http\Controllers\EmployeeController::class, 'change_access'])->name('change_access');

});

Auth::routes();
