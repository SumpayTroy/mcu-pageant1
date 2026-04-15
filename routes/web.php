<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function ()
{
    return view('login');
});

Route::get('/admin/dashboard', function ()
{
    return view('admin.dashboard');
})->name('admin.dashboard');

// ─── Admin ───────────────────────────────
Route::get('/admin/user-roles', [UserController::class, 'index'])->name('admin.user-roles');

Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');

Route::get('/admin/events/create', function () { return view('admin.events-create'); })->name('admin.events.create');

Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');

Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');

Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');

Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');

Route::put('/admin/events/{event}/assign/{type}', [EventController::class, 'assign'])->name('admin.events.assign');

Route::delete('/admin/events/{event}/unassign/{type}/{id}', [EventController::class, 'unassign'])->name('admin.events.unassign');

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

Route::get('/admin/contestants', [ContestantController::class, 'index'])->name('admin.contestants');
Route::get('/sas/contestants', [ContestantController::class, 'index'])->name('sas.contestants');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
