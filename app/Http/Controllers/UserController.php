<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers()
    {
        $allUsers = User::all();
        return view('admin/all-users', compact('allUsers'));
    }

    public function addUser(User $singleUser, Request $request)
    {
        $singleUser->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role')
        ]);
        return redirect()->route('users.all');
    }

    public function editUser(User $singleUser)
    {
        $roles = ['user', 'admin'];
        return view('admin/edit-user', compact('singleUser', 'roles'));
    }

    public function updateUser(User $singleUser, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:user,admin',
        ]);

        $singleUser->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role')
        ]);
        return redirect()->route('users.all');
    }

    public function deleteUser(User $singleUser)
    {
        $singleUser->delete();
        return redirect()->route('users.all');
    }
}
