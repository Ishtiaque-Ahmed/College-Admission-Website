<?php

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



Route::get('/set', ['uses'=>'basiccontroller@start','as'=>'start']);
Route::get('/setup', ['uses'=>'basiccontroller@log_out','as'=>'logout']);
Route::post('/signup',['uses'=>'basiccontroller@initiate','as'=>'signup']);
Route::get('/home',['uses'=>'basiccontroller@homepage','as'=>'home','middleware'=>'auth']);
Route::get('/home/apply',['uses'=>'basiccontroller@apply','as'=>'apply','middleware'=>'auth']);
Route::post('/home',['uses'=>'basiccontroller@save_application','as'=>'done','middleware'=>'auth']);
Route::get('/admin_login', ['uses'=>'admincontroller@front','as'=>'something']);
Route::post('/dashboard', ['uses'=>'admincontroller@get_admin','as'=>'get_admin']);
Route::get('/admin',['uses'=>'admincontroller@admin_dashboard','as'=>'front','middleware'=>'auth:admin']);


Route::get('/home/application_status',['uses'=>'basiccontroller@status','as'=>'status','middleware'=>'auth']);
Route::get('/dashboard/result', ['uses'=>'admincontroller@result_tab','as'=>'result_tab','middleware'=>'auth:admin']);
Route::post('/generate',['uses'=>'admincontroller@produce_result','as'=>'generate']);
Route::get('/home/contact',['uses'=>'basiccontroller@view_contact','as'=>'view_contact','middleware'=>'auth']);
Route::post('/home/contact',['uses'=>'basiccontroller@send_message','as'=>'send_message','middleware'=>'auth']);
Route::get('/dashboard/logout', ['uses'=>'admincontroller@log_out','as'=>'logoutadmin','middleware'=>'auth:admin']);
Route::get('/dashboard/messages', ['uses'=>'admincontroller@message_box','as'=>'m_box','middleware'=>'auth:admin']);
