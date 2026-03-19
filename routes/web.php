<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function ()
{
    return view('login');
});

Route::get('/admin/dashboard', function ()
{
    return view('admin.dashboard');
})->name('admin.dashboard');

/* USER ROLES PAGE */
Route::get('/admin/user-roles', [UserController::class, 'index'])->name('admin.user-roles');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/admin/contestants', [ContestantController::class, 'index'])->name('admin.contestants');

// ─── Judge ──
Route::get('/judge/dashboard', function ()
{
    return view('judge.dashboard');
})->name('judge.dashboard');

// ─── SAS ───
Route::get('/sas/dashboard', function ()
{
    return view('sas.dashboard');
})->name('sas.dashboard');
Route::get('/sas/contestants', [ContestantController::class, 'index'])->name('sas.contestants');


// ─── Auth ─
Route::get('/auth/microsoft',          [AuthController::class, 'redirect'])->name('auth.microsoft');
Route::get('/auth/microsoft/callback', [AuthController::class, 'callback'])->name('auth.callback');
Route::post('/logout',                 [AuthController::class, 'logout'])->name('auth.logout');

// ─── TEMPORARY DEV LOGIN (remove before production) ───
Route::get('/dev-login/{role}', function ($role) {
    $user = App\Models\User::where('role', $role)->where('status', 'active')->first();
    if ($user) {
        Auth::login($user);
        return match($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'judge' => redirect()->route('judge.dashboard'),
            'sas'   => redirect()->route('sas.dashboard'),
            default => redirect('/'),
        };
    }
    return 'No user found with role: ' . $role;
})->middleware('web');
