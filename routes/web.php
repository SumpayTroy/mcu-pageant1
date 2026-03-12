<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
