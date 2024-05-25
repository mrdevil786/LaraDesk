<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\FileUploader;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // RETRIEVE ALL USERS AND DISPLAY THEM IN A VIEW
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // CREATE PAGE FOR A SPECIFIC USER
    public function create()
    {
        return view('admin.user.create');
    }

    // VALIDATE AND STORE A NEW USER
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'role' => 'required|in:1,2,3',
            'avatar' => 'mimes:png,jpg,jpeg,webp,svg,gif',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_role = $request->role;

        if ($request->hasFile('avatar')) {
            $user->avatar = FileUploader::uploadFile($request->file('avatar'), 'images/admin-avatar');
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User registered successfully!');
    }

    // FIND A SPECIFIC USER AND SHOW THE EDIT FORM
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $isEdit = true;
        return view('admin.user.edit', compact('user', 'isEdit'));
    }

    // VIEW A SPECIFIC USER
    public function view($id)
    {
        $user = User::findOrFail($id);
        $isEdit = false;
        return view('admin.user.edit', compact('user', 'isEdit'));
    }

    // UPDATE A USER'S DETAILS
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'role' => 'required|in:1,2,3',
            'avatar' => 'mimes:png,jpg,jpeg,webp,svg,gif',
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->role;

        if ($request->hasFile('avatar')) {
            $user->avatar = FileUploader::uploadFile($request->file('avatar'), 'images/admin-avatar', $user->avatar);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    // UPDATE USER'S STATUS (ACTIVE OR BLOCKED)
    public function status(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|exists:users,id',
            'status' => 'required|in:active,blocked',
        ]);

        $user = User::findOrFail($request->id);

        if ($user->user_role != 1) {
            $user->update(['status' => $request->status]);
            return response()->json(['message' => 'User status updated successfully']);
        } else {
            return response()->json(['warning' => 'Cannot update status for administrator']);
        }
    }

    // DELETE A USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
