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
Route::group(['middleware' => ['web']], function() {

	Route::get('/', 'HomeController@index');
	 
	Auth::routes();

	//Route::get('/register','RegisterController')

	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard','HomeController@index');
	Route::get('/user_dashboard','HomeController@index');

	/*** View/Add/Edit vehicle route ***/
	Route::get('/vehicles','VehicleController@viewVehicles');

	Route::get('/vehicles/view/{id}','VehicleController@viewVehicle');
	Route::get('/vehicles/view/{id}/services','VehicleController@viewVehicleServices');
	Route::get('/vehicles/view/{id}/work_orders','VehicleController@viewVehicleWorkOrders');
	Route::get('/vehicles/view/{id}/issues','VehicleController@viewVehicleIssues');
	Route::get('/vehicles/view/{id}/fuel_log','VehicleController@viewVehicleFuelLog');

	Route::get('/vehicles/add','VehicleController@addVehicleForm');
	Route::post('/vehicles/add','VehicleController@addVehicleSubmit');

	Route::get('/vehicles/edit/{id}','VehicleController@editVehicleForm');
	Route::post('/vehicles/edit/{id}','VehicleController@editVehicleSubmit');

	/*** View/Add/Edit driver route ***/
	Route::get('/drivers','DriverController@viewDrivers');

	Route::get('/drivers/add','DriverController@addDriverForm');
	Route::post('/drivers/add','DriverController@addDriverSubmit');

	Route::get('/drivers/view/{id}','DriverController@viewDriver');

	Route::get('/drivers/edit/{id}','DriverController@editDriverForm');
	Route::post('/drivers/edit/{id}','DriverController@editDriverSubmit');

	Route::get('/drivers/delete/{id}','DriverController@deleteDriverForm');
	Route::post('/drivers/delete/{id}','DriverController@deleteDriverSubmit');
	
	/*** View/Add/Edit User route ***/
    Route::get('/update','UserController@viewUsers');
   	Route::get('/users/add','RegisterController@addUserForm');
   
   	Route::post('/users/add','UserController@addUserSubmit');
    Route::get('/users/edit','UserController@editUserForm');
    
    Route::post('/users/edit','UserController@editUserSubmit');
    Route::get('/users/edit','UserController@editUserForm');
	Route::post('/users/edit','UserController@editUserSubmit');

	Route::get('/users/edit/{id}','AdminController@editUserForm');
	Route::post('/users/edit/{id}','AdminController@editUserSubmit');

	Route::get('/users/delete/{id}','AdminController@deleteUserForm');
	Route::post('/users/delete/{id}','AdminController@deleteUserSubmit');
     
     Route::get('/users','AdminController@viewUsers');
     Route::get('/admins','AdminController@viewAdmins');
	 Route::get('/admins/edit','AdminController@editAdminForm');
	Route::post('/admins/edit','AdminController@editAdminSubmit');

   		/*** View/Add/Edit Assigned_service route ***/
 Route::get('/assigned_services','Assigned_serviceController@viewAssigned_services');
    
 Route::get('/assigned_services/add','Assigned_serviceController@addAssigned_serviceForm');
   Route::post('/assigned_services/add','Assigned_serviceController@addAssigned_serviceSubmit');

 Route::get('/assigned_services/edit','Assigned_serviceController@editAssigned_serviceForm');
   Route::post('/assigned_services/edit','Assigned_serviceController@editAssigned_serviceSubmit');
   Route::get('/assigned_services/delete/{serv_id}','Assigned_serviceController@deleteAssigned_serviceForm');

   Route::get('/finished_services','Finished_serviceController@viewFinished_services');
    
 Route::get('/finished_services/add','Finished_serviceController@addFinished_serviceForm');
   Route::post('/finished_services/add','Finished_serviceController@addFinished_serviceSubmit');

 Route::get('/finished_services/edit','Finished_serviceController@editFinshed_serviceForm');
   Route::post('/finished_services/edit','Finished_serviceController@editFinished_serviceSubmit');

Route::get('/finished_services/delete/{serv_id}','Finished_serviceController@deleteFinished_serviceForm');

 Route::get('/meter_errors','Finished_serviceController@viewerrors');
   
            /*** View/Add/Edit service route ***/

Route::get('/services','ServiceController@viewServices');
Route::get('/services/add','ServiceController@addServiceForm');
Route::post('/services/add','ServiceController@addServiceSubmit');
Route::post('/services/edit','ServiceController@addServiceSubmit');
          
          /*** View/Add/Edit service route ***/
Route::get('/reminders','ReminderController@viewReminders');
Route::get('/reminders/add','ReminderController@addReminderForm');
Route::post('/reminders/add','ReminderController@addReminderSubmit');
Route::get('/reminders/view/{id}/issues','ReminderController@viewIssueReminder');
//Route::post('/reminders/edit','ReminderController@addReminderSubmit');

	Route::get('/reminders/edit/{id}','ReminderController@editReminderForm');
	Route::post('/reminders/edit/{id}','ReminderController@editReminderSubmit');
          /*** notifications service route ***/
Route::get('/notifications','NotificationController@viewNotifications');
Route::get('/notifications/view/{id}/assigned_services','NotificationController@viewaAssigned_service_notification');
Route::get('/notifications/view/{id}/finished_services','NotificationController@viewaFinieshed_service_notification');

          
          /*** View/Add/Edit issues route ***/
	Route::get('/issues','IssueController@viewIssues');

	Route::get('/issues/add','IssueController@addIssueForm');
	Route::post('/issues/add','IssueController@addIssueSubmit');

	Route::get('/issues/edit','IssueController@editIssueForm');
	Route::post('/issues/edit','IssueController@editIssueSubmit');

	/*** View/Add/Edit fuelentries route ***/
	Route::get('/fuelentries','FuelEntryController@viewFuelEntries');

	Route::get('/fuelentries/add','FuelEntryController@addFuelEntryForm');
	Route::post('/fuelentries/add','FuelEntryController@addFuelEntrySubmit');

	Route::get('/fuelentries/edit','FuelEntryController@editFuelEntryForm');
	Route::post('/fuelentries/edit','FuelEntryController@editFuelEntrySubmit');

	/*** report ***/
	Route::get('/report','ReportController@report');
	Route::post('report','ReportController@reportSubmit');

	/** employee */
    Route::get('/work_orders','Work_orderController@viewWork_orders');
   Route::get('/work_orders/add','Work_orderController@addWork_orderForm');
   Route::post('/work_orders/add','Work_orderController@addWork_orderSubmit');
   Route::get('/work_orders/edit','Work_orderController@editWork_orderForm');
   Route::post('/work_orders/edit','Work_orderController@editWork_orderSubmit');
   Route::get('/events','EventController@viewEvents');
/** */
	//
	Route::get('/denied', function() {
	 	return view('layouts.404');
	});

});

 


