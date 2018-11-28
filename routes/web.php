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

/**
 * General experience summary route; this is the CMS homepage.
 */
Route::get('/', 'ExperienceController@index')->name('home');

/***
 * Resourceful routes
 */
Route::resource('skillsets', 'SkillsetController')->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);
Route::resource('skills', 'SkillController')->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

/**
 * Authentication
 */
Auth::routes();

