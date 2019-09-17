<?php

use App\User;

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

Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'admin' , 'middleware' => ['admin']] , function(){
	Route::get('/users', 'UserController@index')->name('users.index');
	Route::get('/users/create', 'UserController@create')->name('users.create');
	Route::post('/users/create', 'UserController@store')->name('users.store');
	Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::post('/users/{id}/update', 'UserController@update')->name('users.update');
	Route::get('/user/{id}/assign', 'UserController@assign')->name('user.assign');
	Route::post('/user/{id}/assign', 'UserController@post_assign')->name('user.post-assign');

	Route::get('/projects', 'ProjectController@index')->name('projects.index');
	Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
	Route::post('/projects/create', 'ProjectController@store')->name('projects.store');

	Route::get('/reports', 'ProjectController@index')->name('projects.index');
	
	Route::get('/get-users', function(){
		$data['users'] = User::paginate(10);
		return view('users.get-users')->with($data);
	})->name('users.get');
	Route::group(['prefix' => 'monitor'] , function(){
		Route::get('/' , function(){
			// MonitorJar::test();
			$user = User::find(2);
			dd($user->m_updated());
		});
	});
});


Route::get('logout' , 'Auth\LoginController@logout');
