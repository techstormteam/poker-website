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
Route::get('/', 'HomeController@get_index');
Route::controller('home', 'HomeController');
Route::controller('test', 'TestController');
Route::controller('admin', 'AdminController');
Route::controller('admin/tournament', 'AdminTournamentController');
//System
Route::get('schedulejob/give_freerolls', 'ScheduleJobController@get_give_freerolls');

//Admin
//Route::get('admin', 'AdminController@get_index');
//Route::get('admin/schedulejob/give_freerolls', 'AdminController@get_give_freerolls');
//Route::get('admin/tournament', 'AdminTournamentController@get_index');
//Route::get('admin/tournament/add_view', 'AdminTournamentController@get_add_view');
//Route::get('admin/tournament/list_view', 'AdminTournamentController@get_list_view');
//Route::post('admin/tournament/add', 'AdminTournamentController@post_add');
//Route::get('admin/tournament/delete/{name}', array('as' => 'group', 'uses' => 'AdminTournamentController@get_delete'));
//Route::get('admin/tournament/online/{name}', array('as' => 'group', 'uses' => 'AdminTournamentController@get_online'));
//Route::get('admin/tournament/offline/{name}', array('as' => 'group', 'uses' => 'AdminTournamentController@get_offline'));

//Route::resource('nerds', 'NerdController');
