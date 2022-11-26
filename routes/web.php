<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    return view('frontend.index');
});
Route::get('/log-in', function () {
    return view('frontend.login.login');
});
Route::get('/dashboard', function () {
    return view('frontend.login.dashboard');
});

Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
});
Route::get('/admin/users/upload-documents',function(){
    return view('admin.document');
});
Route::prefix('admin')->group(function(){
    Route::view('/login','admin.login')->name('login')->middleware('guest');
        Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/dashboard',[AuthController::class,'DashBoard'])->name('dashboard');
            Route::get('/logout',[AuthController::class,'Logout'])->name('logout');

            Route::controller(UserController::class)->group(function(){
                Route::get('/create-user','CreateUser')->name('usercreate');
                Route::post('/insert_user','InsertUser')->name('insertuser');
                Route::get('/users','User')->name('users');
                Route::get('/delete_user/{id}','DeleteUser')->name('deleteuser');
                Route::get('/edit-user/{id}','EditUser')->name('edituser');
                Route::post('/updateuser/{id}','UpdateUser')->name('upadteuser');
                Route::get('/delete_data/{id}','DeleteData')->name('deletedata');
                Route::get('/upload-documents/{user_id?}','UploadDocument')->name('uploaddocument');
                Route::post('/document_update/{id?}','UpdateDcoument')->name('updatedocument');
            });
        });
});
