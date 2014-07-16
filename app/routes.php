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
Route::get('admin', 'AdminController@get_index');
Route::get('admin/tournament', 'AdminTournamentController@get_index');
Route::get('admin/tournament/add_view', 'AdminTournamentController@get_add_view');

Route::resource('nerds', 'NerdController');
