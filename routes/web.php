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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
	
Route::group(['middleware' => 'auth'], function() {

	Route::get('/', 'BackendController@dashboard')->name('dashboard');

	Route::get('/holidays', 'BackendController@holiday')->name('holiday');

	Route::get('/events', 'BackendController@event')->name('event');

	Route::get('/hr-social', 'BackendController@social')->name('hr-social');

	Route::get('/worldwide-centres', 'BackendController@worldwide')->name('worldwide-centres');

// Route::get('/departments', 'DepartmentController@index')->name('department');

// Route::get('/department/{id}', 'DepartmentController@update')->name('editDepartment');

	Route::resource('departments', 'DepartmentController');

	Route::resource('designations', 'DesignationController');

	Route::resource('employees', 'EmployeeController');

	Route::resource('leaves', 'LeaveController');

	Route::resource('salaries', 'SalaryController');

	Route::resource('overtimes', 'OvertimeController');

	Route::resource('attendances', 'AttendanceController');

	Route::resource('payrolls', 'PayrollController');

	Route::post('/getsalary/{value}', 'PayrollController@getSalary')->name('getsalary');

	Route::post('/getovertime/{id}', 'PayrollController@getOvertime')->name('getovertime');

	Route::post('/getleave/{id}', 'PayrollController@getLeave')->name('getleave');

	Route::post('/getemployeeforpayroll', 'PayrollController@getEmployeeForPayroll')->name('getemployeeforpayroll');

	Route::get('/setsession/{value}', 'BackendController@setSession')->name('setsession');

	Route::get('/getemployee/{id}', 'UserController@getEmployee')->name('getemployee');

	Route::get('/getemployeephoto/{id}', 'BackendController@getEmployeePhoto')->name('getemployeephoto');

	Route::get('/getinfo', 'BackendController@getInfo')->name('getinfo');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/changepaid/{id}', 'PayrollController@changePaid')->name('changepaid');

	Route::post('/declineleave/{id}', 'LeaveController@declineLeave')->name('declineleave');

	Route::post('/acceptleave/{id}', 'LeaveController@acceptLeave')->name('acceptleave');

	Route::get('/sendmail/{id}','PayrollController@sendmail')->name('sendmail');
	// Route::post('password/email', 'ForgotPasswordController@forgot');

});

Route::group(['middleware' => 'role:admin'], function() {
	
	Route::resource('users', 'UserController');

	});

	