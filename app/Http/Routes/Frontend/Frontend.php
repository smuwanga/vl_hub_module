<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('users/data', 'DashboardController@getData');
        Route::get('hubs/data', 'DashboardController@getHubFacilities');
        //Route::get('hubs/patients', 'DashboardController@getFacilityPatients')->name('frontend.user.patients');
        Route::get('facility/{id}', 'DashboardController@getFacilityPatients');
        Route::get('facilityp/{id}', 'DashboardController@getFacilityPatientsp');

        Route::get('/patientView/{id}', 'DashboardController@getPatientResultsView');
        Route::get('/patientResultsView/{id}', 'DashboardController@getPatientResultsView');

        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});