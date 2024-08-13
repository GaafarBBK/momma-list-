<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        // collect all user$users on val name users
        $users = User::all();

        // return to the client response
        return response()->json(['data' => $users]);
        
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

    public function show($id)
    {
        //step 1 search for user
        //step 2 return user information to client

        //step 1
        $users = User::findorfail($id);

        //step 2
        return response()->json([
            'data' => $users
        ]);

    }

    public function update(Request $request, $id)
    {
        //step 1 validate data
        //step 2 search for user
        //step 3 update user data
        //step 4 return to client success msg

        //step 1
        $input = $request->validate([
            'name' => ['string'],
            'email' => ['string','email', Rule::unique( 'users', 'email') ->ignore($id)]
        ]);

        //step 2
        $users = User::findorfail($id);

        //step 3
        $users->update($input);
        return response()->json([
            'User updated succefully'
        ]);

        //step 4



        // $update = User::find($name);
        // $update->name = ($name) + "to london";
        // $update->save();
    }

    public function delete($id)
    {
        //step 1 search for the user
        //step 2 delete the user
        //step 3 return msg to client

        //step 1
        $users = User::findorfail($id);

        //step 2
        $users->delete();

        //step 3
        return response()->json([
            'data' => 'user deleted successfully'
        ]);
        
        // $delete = User::find($name);
        // $delete->delete();
    }
}
