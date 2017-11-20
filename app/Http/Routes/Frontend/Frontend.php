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
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });

    // Films Routes
    Route::group(['namespace' => 'Film'], function() {
        Route::resource('films', 'FilmController',['only' => [
            'index', 'create', 'show', 'store'
        ]]);

        //for fetching multiple genres
        Route::post('films/genres','FilmController@genres')->name('films.genres');

        //for managing Film comments
        Route::post('films/comments','FilmController@comments')->name('films.comments');
    });

    // Film Genre Routes
    Route::group(['namespace' => 'Genre'], function() {
        Route::resource('genre', 'GenreController', ['only' => [
            'index', 'create', 'store'
        ]]);
    });

    //Film Comments Routes
    Route::group(['namespace' => 'Comment'], function() {
        Route::resource('comment', 'CommentController', ['only' => [
            'index', 'create', 'store'
        ]]);
    });
});