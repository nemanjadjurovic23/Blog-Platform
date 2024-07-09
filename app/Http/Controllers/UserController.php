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
}
