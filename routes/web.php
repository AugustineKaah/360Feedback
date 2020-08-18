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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('users', 'UsersController');
Route::resource('profiles', 'ProfilesController');
//Route::resource('core_values', 'CoreValuesController');
//Route::resource('competencies', 'CompetenciesController');
//Route::resource('competency_levels', 'CompetencyLevelsController');
//Route::resource('competency_actions', 'CompetencyActionsController');
Route::resource('departments', 'DepartmentsController');
Route::resource('myprofile', 'MyProfileController');
Route::post('myprofile/_edit/', 'MyProfileController@myEdit');
Route::resource('competency_assignment', 'CompetencyAssignmentController');
Route::resource('feedback', 'FeedbackController');
Route::get('my_subordinates/view/{id}', 'MyProfileController@mySubsView');
Route::get('my_subordinates', 'MyProfileController@mySubs');
Route::get('submit_feedback', 'FeedbackController@submitFeedback');
Route::get('subordinate_feedback/view/{id}', 'SubmitFeedbackFormController@subordinate_feedback');
Route::get('self_assessment/', 'SubmitFeedbackFormController@self_assessment');
Route::resource('submit_feedback_form', 'SubmitFeedbackFormController');
Route::resource('permissions', 'PermissionsController');
Route::get('my_reports', 'MyReportsController@myReports');
//Route::get('/new_core_value', 'CoreValuesController@index');
//Route::post('/store', 'CoreValuesController@store');
// Route::get('/admin_report/view/{type}','AdminReportsController@detail ' );
// Route::get('/administration', 'AdminReportsController@index')->name('administration');

Route::get('/administration', 'AdminReportsController@index');
Route::get('/admin_report/view/{type}','AdminReportsController@detail ' );
//Route::get('/permissions', 'PermissionsController@index')->name('permissions')->middleware('permission:manage_permissions');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/my_subordinates', function(){
  //  return view('pages.users.my_subordinates');
//});



Route::get('/autocomplete', 'FetchController@index');
Route::post('/autocomplete/fetch', 'FetchController@fetch')->name('autocomplete.fetch');