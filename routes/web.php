<?php


use Illuminate\Support\Facades\Auth;

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

Route::get('court-case', function () {
    return view('court_search');
});

Route::get('prison-case', function () {
    return view('prison_search');
});
  
//Search management
Route::POST('court/result', 'SearchController@court_search')->name('court-search');
Route::POST('prison/result', 'SearchController@prison_search')->name('prison-search');
Route::POST('police/result', 'SearchController@police_search')->name('police-search');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'HomeController@index')->name('home');

    
     //manage Users
     Route::get('/user/profile/edit','ProfileController@user_edit')->name('user.profile');
     Route::get('/admin/profile/edit','ProfileController@edit')->name('user.edit');
     Route::post('/profile/edit','ProfileController@update')->name('user.update'); 
     Route::post('/profile/password','ProfileController@update_password')->name('user.password');  

     //home pages management
     Route::get('medical_records/details/{medical_slip}', 'HomeController@medical_record_details')->name('medical-record');
     Route::get('court_records/details/{court_record}', 'HomeController@court_record_details')->name('court-record');
     Route::get('prison_records/details/{prison_record}', 'HomeController@prison_record_details')->name('prison-record');
     Route::get('police_records/details/{police_record}', 'HomeController@police_record_details')->name('police-record');
     Route::get('invitations/details/{invitation}', 'HomeController@police_invitation_details')->name('invitation');
     

    Route::get('court_records/index', 'HomeController@court_record')->name('court-records');
    Route::get('prison_records/index', 'HomeController@prison_record')->name('prison-records');
    Route::get('police_records/index', 'HomeController@police_record')->name('police-records');
    Route::get('invitations/index', 'HomeController@police_invitation')->name('invitations');
    

    //admin section
    Route::get('admin', 'AdminController@index')->name('admin')->middleware('is_admin');
    Route::get('users', 'UserController@index')->name('users')->middleware('is_admin');
    Route::POST('user/edit/{user}', 'UserController@update')->name('update-user')->middleware('is_admin');
    Route::get('user/edit/{user}', 'UserController@edit')->name('edit-user')->middleware('is_admin');

    Route::DELETE('admin/invitations/delete/{invitation}', 'PoliceInvitationController@destroy')->name('delete-police-invitation')->middleware('is_admin');
    Route::get('admin/invitations/details/{invitation}', 'PoliceInvitationController@show')->name('police-invitation-details')->middleware('is_admin');
    Route::get('admin/invitations/edit/{invitation}', 'PoliceInvitationController@edit')->name('edit-police-invitation')->middleware('is_admin');
    Route::POST('admin/invitations/edit/{invitation}', 'PoliceInvitationController@update')->name('edit-police-invitation')->middleware('is_admin');
    Route::get('admin/invitations/create', 'PoliceInvitationController@create')->name('create-police-invitation')->middleware('is_admin');
    Route::POST('admin/invitations/create', 'PoliceInvitationController@store')->name('create-police-invitation')->middleware('is_admin');
    Route::get('admin/invitations', 'PoliceInvitationController@index')->name('admin-police-invitations')->middleware('is_admin');



    //police Records
    Route::DELETE('admin/police_records/delete/{police_record}', 'PoliceRecordController@destroy')->name('delete-police-record')->middleware('is_admin');
    Route::get('admin/police_records/details/{police_record}', 'PoliceRecordController@show')->name('police-record-details')->middleware('is_admin');
    Route::get('admin/police_records/edit/{police_record}', 'PoliceRecordController@edit')->name('edit-police-record')->middleware('is_admin');
    Route::POST('admin/police_records/edit/{police_record}', 'PoliceRecordController@update')->name('edit-police-record')->middleware('is_admin');    
    Route::get('admin/police_records/create', 'PoliceRecordController@create')->name('admin-police-record')->middleware('is_admin');
    Route::POST('admin/police_records/create', 'PoliceRecordController@store')->name('admin-police-record')->middleware('is_admin');
    Route::get('admin/police_records', 'PoliceRecordController@index')->name('admin-police-records')->middleware('is_admin');

//prison Records
    Route::DELETE('admin/prison_records/delete/{prison_record}', 'PrisonRecordController@destroy')->name('delete-prison-record')->middleware('is_admin');
    Route::get('admin/prison_records/details/{prison_record}', 'PrisonRecordController@show')->name('prison-record-details')->middleware('is_admin');
    Route::get('admin/prison_records/edit/{prison_record}', 'PrisonRecordController@edit')->name('edit-prison-record')->middleware('is_admin');
    Route::POST('admin/prison_records/edit/{prison_record}', 'PrisonRecordController@update')->name('edit-prison-record')->middleware('is_admin');    
    Route::get('admin/prison_records/create', 'PrisonRecordController@create')->name('admin-prison-record')->middleware('is_admin');
    Route::POST('admin/prison_records/create', 'PrisonRecordController@store')->name('admin-prison-record')->middleware('is_admin');
    Route::get('admin/prison_records', 'PrisonRecordController@index')->name('admin-prison-records')->middleware('is_admin');
    
    //medical Slips
    Route::DELETE('admin/medical_slips/delete/{medical_slip}', 'MedicalSlipController@destroy')->name('delete-medical-record')->middleware('is_admin');
    Route::get('admin/medical_slips/details/{medical_slip}', 'MedicalSlipController@show')->name('medical-record-details')->middleware('is_admin');
    Route::get('admin/medical_slips/edit/{medical_slip}', 'MedicalSlipController@edit')->name('edit-medical-record')->middleware('is_admin');
    Route::POST('admin/medical_slips/edit/{medical_slip}', 'MedicalSlipController@update')->name('edit-medical-record')->middleware('is_admin');    
    Route::get('admin/medical_slips/create', 'MedicalSlipController@create')->name('admin-medical-record')->middleware('is_admin');
    Route::POST('admin/medical_slips/create', 'MedicalSlipController@store')->name('admin-medical-record')->middleware('is_admin');
    //Route::get('admin/medical_slips', 'PrisonRecordController@index')->name('admin-prison-records')->middleware('is_admin');
    

    //Court Records

    Route::DELETE('admin/court_records/delete/{court_record}', 'CourtRecordController@destroy')->name('delete-court-record')->middleware('is_admin');
    Route::get('admin/court_records/details/{court_record}', 'CourtRecordController@show')->name('court-record-details')->middleware('is_admin');
    Route::get('admin/court_records/edit/{court_record}', 'CourtRecordController@edit')->name('edit-court-record')->middleware('is_admin');
    Route::POST('admin/court_records/edit/{court_record}', 'CourtRecordController@update')->name('edit-court-record')->middleware('is_admin');    
    Route::get('admin/court_records/create', 'CourtRecordController@create')->name('admin-court-record')->middleware('is_admin');
    Route::POST('admin/court_records/create', 'CourtRecordController@store')->name('admin-court-record')->middleware('is_admin');
    Route::get('admin/court_records', 'CourtRecordController@index')->name('admin-court-records')->middleware('is_admin');
    

    Route::get('adduser', 'UserController@adduser')->name('add-user')->middleware('is_admin');
    Route::get('userchart', 'AdminController@userchart')->name('user-chart');
    Route::get('test', 'HomeController@chart');
    Route::get('offline-saving', 'AdminController@offlinesaving')->name('offline-saving')->middleware('is_admin');
    Route::get('transaction', 'AdminController@transaction')->name('transaction')->middleware('is_admin');
    Route::get('/downloadPDF/{id}', 'AdminController@downloadPDF')->name('adminsingle');
    Route::get('/downloadPDF', 'AdminController@downloadallPDF')->name('adminall');
    Route::get('cancel-membership', 'AdminController@cancelmembership')->name('cancelmembership')->middleware('is_admin');

    Route::PUT('admin-deductwallet/{id}', 'UserController@deductwallet')->name('deductwallet')->middleware('is_admin');
    Route::PUT('admin-addwallet/{id}', 'UserController@addwallet')->name('addwallet')->middleware('is_admin');
   
    Route::PUT('admin-acceptloan/{id}', 'AdminController@acceptloan')->name('accept-loan')->middleware('is_admin');
    Route::PUT('admin-rejectloan/{id}', 'AdminController@rejectloan')->name('reject-loan')->middleware('is_admin');
    Route::PUT('admin-payloan/{id}', 'AdminController@payloan')->name('pay-loan')->middleware('is_admin');
    Route::PUT('admin-acceptwithdrawal/{id}', 'AdminController@acceptwithdrawal')->name('accept-withdrawal')->middleware('is_admin');
    Route::PUT('admin-rejectwithdrawal/{id}', 'AdminController@rejectwithdrawal')->name('reject-withdrawal')->middleware('is_admin');
    Route::post('admin-createuser', 'UserController@createuser')->name('create-user')->middleware('is_admin');
    Route::PUT('accept-offlinesaving/{id}', 'AdminController@acceptofflinesaving')->name('accept-offlinesaving')->middleware('is_admin');
    Route::PUT('reject-offlinesaving/{id}', 'AdminController@rejectofflinesaving')->name('reject-offlinesaving')->middleware('is_admin');
    Route::PUT('update-password/{id}', 'UserController@updatePassword')->name('admin.password');
    Route::post('sendtransaction', 'AdminController@sendtransaction')->name('sendtransaction');
    Route::PUT('approvecancel/{cancel}', 'AdminController@approvecancel')->name('approve-cancel')->middleware('is_admin');
    Route::DELETE('admin-delete/{user}', 'UserController@destroy')->name('admin-delete')->middleware('is_admin');
});
