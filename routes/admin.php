<?php

use Illuminate\Http\Request;

Route::get('/admin', function () {
    return view('welcome');
});
