<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\EventController;

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

Route::get('/admin/events/create', function () {
    return view('admin.events-create');
})->name('admin.events.create');

// ─── Judge ───────────────────────────────
Route::get('/judge/dashboard', function ()
{
    return view('judge.dashboard');
})->name('judge.dashboard');

// ─── SAS ─────────────────────────────────
Route::get('/sas/dashboard', function ()
{
    return view('sas.dashboard');
})->name('sas.dashboard');

Route::get('/sas/contestants', [ContestantController::class, 'index'])->name('sas.contestants');

Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');
