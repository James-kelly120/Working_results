<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;

class UsersController extends Controller
{
    public function index()
    {
        return view('users');
    }
    public function usersList()
    {
        $users = DB::table('users')->select('*');
        // echo "<pre>";
        // print_r($users);
        // echo "</pre>";
        return datatables()->of($users)
            ->make(true);
    }
}
