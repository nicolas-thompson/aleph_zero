<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function search(Request $request) 
    {
        // dd($request->terms);

        $users = User::where('last_name', 'like', '%' . $request->terms . '%')
            ->orWhere('first_name', 'like', '%' . $request->terms . '%')
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->get();

        return response()->json($users, 200);
    }
}
