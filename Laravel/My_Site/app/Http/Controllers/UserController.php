<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
           'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($data->fails()) {
            return $data->errors();
        }

        $userdata = $request->all();
        $userdata['active'] = true;

        User::create([
            'name' => $userdata['name'],
            'email' => $userdata['email'],
            'password' => Hash::make($userdata['password']),
            'active' => $userdata['active'],
        ]);

        return 'success';
    }
}
