<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('login');
});

Route::get('/admin/dashboard', function ()
{
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/user-roles', function ()
{
    return view('admin.user-roles');
})->name('admin.user-roles');
