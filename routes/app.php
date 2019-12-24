<?php

Route::get('', function () {
    return 'Salut les amis';
});


Route::get('/home', 'HomeController@index');


Route::get('/about', function () {
    return 'About Me';
});


Route::get('/contact', function () {
    return 'Salut les amis';
});


Route::post('/add', 'HomeController@new');
