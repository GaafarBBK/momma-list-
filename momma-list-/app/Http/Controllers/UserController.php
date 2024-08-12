<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // collect all users on val name users
        $user = User::all();

        // return to the client response
        return response()->json(['data' => $user]);
        
    }

    public function store(Request $request)
    {
        //step 1 validate the input data 
        //step 2 store the user on the database
        //step 3 reutrn message to the client

        //step 1
        $input = $request->validate([
            'name' => ['string','required'],
            'email' => ['required','string','unique:users,email'],
        ]);
        
        //step 2
        User::create($input);
        

        //step 3
        return response()->json([
            'message' => 'User created successfully'
        ]);
    }

    public function update(Request $name)
    {
        $update = User::find($name);
        $update->name = ($name) + "to london";
        $update->save();
    }

    public function delete(Request $name)
    {
        $delete = User::find($name);
        $delete->delete();
    }
}
