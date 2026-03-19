<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     // Show User Roles Page
    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 10);

        // Validate per_page to prevent abuse
        if (!in_array($perPage, [10, 25, 50, 100])) {
            $perPage = 10;
        }

        $users = User::paginate($perPage);

        // Count roles for summary pills (query all, not just current page)
        $roleCounts = User::selectRaw('role, count(*) as count')
                          ->groupBy('role')
                          ->pluck('count', 'role');

        return view('admin.user-roles', compact('users', 'roleCounts'));
    }


    // STORE NEW USER (Add User Modal)
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role'  => 'nullable|in:admin,judge,tabulator,guest,sas',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make('password'), // default password
            'role'     => $request->role ?? 'guest',
            'status'   => 'active',
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }


    // UPDATE USER (Edit Modal)
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'role'   => 'required|in:admin,judge,tabulator,guest,sas',
            'status' => 'required|in:active,pending,inactive',
        ]);

        $user->update($request->only('name','email','role','status'));

        return redirect()->route('admin.user-roles', [
        'page'     => request('page', 1),
        'per_page' => request('per_page', 10),
        ])->with('success', 'User updated successfully.');
    }

}
