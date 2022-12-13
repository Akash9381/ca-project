<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadDocumentController;
use App\Http\Controllers\GSTController;
use App\Http\Controllers\IncomeTaxController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TaxAuditController;
use App\Http\Controllers\TDSController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Api\V2010\Account\Call\PaymentContext;

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

Route::get('/', function () {return view('frontend.index');})->name('home');
Route::get('/home',function(){return view('frontend.index');});
Route::view('/about-us','frontend.about');
Route::view('/contact-us','frontend.contact-us');
Route::view('/pricing-details','frontend.pricing-details');
Route::view('/privacy-policy','frontend.privacy-policy');
Route::view('/refunds-policy','frontend.refunds-policy');
Route::view('/terms-and-conditions','frontend.terms-and-conditions');

Route::post('contactform',[ContactController::class,'Contactform']);
Route::view('/log-in','frontend.login.login')->name('user.login')->middleware('guest');

Route::post('otpverify',[OTPController::class,'OTPVerify']);
Route::post('otp-generate',[OTPController::class,'GenerateOTP']);
Route::group(['middleware'=>['role:user']],function(){
    Route::get('/dashboard',[PaymentController::class,'Dashboard'])->name('userdashboard');
    Route::get('/logout',[AuthController::class,'UserLogOut'])->name('user.logout');
    Route::get('/payment',[PaymentController::class,'index'])->name('razorpay.payment.index');
    Route::post('/store',[PaymentController::class,'store'])->name('razorpay.payment.store');
    Route::controller(DownloadDocumentController::class)->group(function(){
        Route::get('/dashboard/gst/{id}','ARN');
        Route::get('/dashboard/income-tax/{id}','Incomedata');
        Route::get('/dashboard/tds/{id}','TDSdata');
        Route::get('/dashboard/tax-audit/{id}','TaxAuditdata');
    });
});

Route::prefix('admin')->group(function(){
    Route::view('/login','admin.login')->name('login')->middleware('guest');
        Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/dashboard',[AuthController::class,'DashBoard'])->name('dashboard');
            Route::get('/logout',[AuthController::class,'Logout'])->name('logout');
            Route::get('/contact',[ContactController::class,'Index']);
            Route::controller(UserController::class)->group(function(){
                Route::get('/create-user','CreateUser')->name('usercreate');
                Route::post('/insert_user','InsertUser')->name('insertuser');
                Route::get('/users','User')->name('users');
                Route::get('/delete_user/{id}','DeleteUser')->name('deleteuser');
                Route::get('/edit-user/{id}','EditUser')->name('edituser');
                Route::post('/update-user/{id}','UpdateUser')->name('upadteuser');
                Route::get('/delete_data/{id}','DeleteData')->name('deletedata');
                Route::get('/upload-documents/{user_id?}','UploadDocument')->name('uploaddocument');
                Route::post('/userexceluploaded','UserExcelUploded')->name('useruploded');
            });

            Route::controller(GSTController::class)->group(function(){
                Route::get('/upload-documents/gst-data/{id}','EditGstData');
                Route::post('/update-documents/gst-data/{id}','UpdateGstData');
                Route::get('/gst-document-delete/{id}','DeleteDocuments');
                Route::get('/delete-gst/{id}','Deletedata');
            });
            Route::controller(IncomeTaxController::class)->group(function(){
                Route::get('/upload-documents/income-tax/{id}','EditIncomeTaxData');
                Route::post('/update-documents/income-tax-data/{id}','UpdateIncomeTaxData')->name('updateincometaxdata');
                Route::get('/income-document-delete/{id}','DeleteDocuments');
                Route::get('/delete-income-tax/{id}','Deletedata');
            });

            Route::controller(TDSController::class)->group(function(){
                Route::get('/upload-documents/tds-data/{id}','EditTDS');
                Route::post('/update-documents/tds-data/{id}','UpdateTDS');
                Route::get('/tds-document-delete/{id}','DeleteDocuments');
                Route::get('/delete-tds-data/{id}','Deletedata');
            });

            Route::controller(TaxAuditController::class)->group(function(){
                Route::get('/upload-documents/tax-audit-data/{id}','EditTaxAudit');
                Route::post('/update-documents/tax-audit-data/{id}','UpdateTaxAudit');
                Route::get('/tax-audit-document-delete/{id}','DeleteDocuments');
                Route::get('/delete-tax-audit/{id}','Deletedata');
            });
            Route::post('/document_create',[DocumentController::class,'InsertDocument']);
        });
});
