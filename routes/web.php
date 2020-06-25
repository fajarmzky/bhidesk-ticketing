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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
   return view('layouts.master');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/customers', 'Customer\CustomerController@getAllCustomers');
    Route::post('/addCustomers','Customer\CustomerController@addCustomers');
    Route::get('/editCustomers/{id}','Customer\CustomerController@editCustomers');
    Route::post('/updateCustomers/{id}','Customer\CustomerController@updateCustomers');
    Route::post('/deleteCustomers/{id}','Customer\CustomerController@deleteCustomers');

    Route::get('/projects', 'Projects\ProjectController@getAllProjects');
    Route::post('/addProject', 'Projects\ProjectController@addProject');
    Route::get('/editProject/{id}', 'Projects\ProjectController@editProject');
    Route::post('/updateProject/{id}', 'Projects\ProjectController@updateProject');
    Route::post('/deleteProject/{id}', 'Projects\ProjectController@deleteProject');


    Route::get('/tickets', 'Tickets\TicketController@getAllTickets');
    Route::post('/addTicket', 'Tickets\TicketController@addTicket');
    Route::get('/editTicket/{id}', 'Tickets\TicketController@editTicket');
    Route::post('/updateTicket/{id}', 'Tickets\TicketController@updateTicket');
    Route::post('/deleteTicket/{id}', 'Tickets\TicketController@deleteTicket');

    Route::get('/users', 'Auth\UserController@getAllUsers');
    Route::post('/addUsers', 'Auth\UserController@addUsers');
    Route::get('/editUsers/{id}', 'Auth\UserController@editUsers');
    Route::post('/updateUsers/{id}', 'Auth\UserController@updateUsers');
    Route::post('/deleteUsers/{id}', 'Auth\UserController@deleteUsers');

});

