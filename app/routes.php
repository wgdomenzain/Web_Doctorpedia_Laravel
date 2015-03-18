<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'SearchController@index');
Route::get('logout', 'LoginController@logout');
Route::get('doctor_list', 'SearchController@doctor_list');
Route::post('mini_calendar/{date}/{parameter}','AppointmentsController@mini_calendar');
Route::post('doctor_availability', 'AppointmentsController@get_doctor_availability');
//Cross-Site Request Forgery
Route::group(array('before' => 'csrf'), function(){
	Route::post('DLogin', 'LoginController@login_doctor');
	Route::post('PLogin', 'LoginController@login_paciente');
	Route::post('PRegister','RegisterController@register_paciente');
	Route::post('DRegister','RegisterController@register_doctor');
	Route::post('DRegister_schedule','RegisterController@register_schedule');
});

//Tener que estar en sesión
Route::group(array('before' => 'auth'), function(){

	Route::get('messages','CommentsController@index');

	//Tiene que ser doctor
	Route::group(array('before' => 'doctor'),function(){
		Route::get('appointments', 'AppointmentsController@index');
		Route::get('appointments/date/{date}', 'AppointmentsController@day_dates');
		Route::get('profile', 'ProfileController@profile_doctor');
		Route::get('calendar/{date}/{parameter}', 'AppointmentsController@calendar');

		//Tiene que ser doctor y CSRF
		Route::group(array('before' => 'csrf'), function(){
			Route::post('update_doctor','RegisterController@update_doctor');
			Route::post('accept','AppointmentsController@accept_appointment');
			Route::post('cancel','AppointmentsController@cancel_appointment');
		});
	});

	//Tiene que ser paciente
	Route::group(array('before' => 'patient'),function(){
		Route::get('appointments_patient', 'AppointmentsController@appointments_patient');
		Route::get('calendar_patient/{date}/{parameter}', 'AppointmentsController@calendar_patient');
		Route::get('appointments_patient/date/{date}', 'AppointmentsController@day_dates_patient');
		Route::post('request_appointment', 'AppointmentsController@request_appointment');
		Route::get('profile_patient','ProfileController@profile_patient');
		//Tiene que ser paciente y CSRF
		Route::group(array('before' => 'csrf'), function(){
			
		});
	});

});