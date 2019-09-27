<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function search(Request $request) 
    {
        $query = User::where('last_name', 'like', '%' . $request->terms . '%')
            ->orWhere('first_name', 'like', '%' . $request->terms . '%')
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc');
            
        if($request->dupes){
            $query->groupBy('first_name');
        }

        $matches = $query->get();

        return response()->json($matches, 200);
    }
}
