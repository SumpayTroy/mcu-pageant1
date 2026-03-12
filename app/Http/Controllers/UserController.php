<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'role'   => 'required|in:admin,judge,tabulator',
            'status' => 'required|in:active,pending,inactive',
        ]);

        $user->update($request->only('name', 'email', 'role', 'status'));

        return back()->with('success', 'User updated successfully.');
    }
}
