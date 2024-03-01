<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'role' => 'required|in:1,2,3',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User registered successfully!');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:4|confirmed',
            'password_confirmation' => 'nullable|min:4',
            'role' => 'required|in:1,2,3',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'user_role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
