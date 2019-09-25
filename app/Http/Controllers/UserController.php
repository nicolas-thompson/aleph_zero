<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        dd($users);
    }

    public function search($term) 
    {
        $users = User::where('last_name', 'like', '%' . $term . '%')
            ->orWhere('first_name', 'like', '%' . $term . '%')
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->get();

        return response()->json($users);
    }
}
