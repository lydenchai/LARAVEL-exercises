<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    
    public function register(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $token = $user->createToken('MyToken')->plainTextToken;

        return response()->json([
            'Message' => 'Created',
            'data' => $user,
            'token' => $token
        ], 201);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['Message' => 'Logouted']);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['Message' => 'Bed login']);
        }

        $token = $user->createToken('MyToken')->plainTextToken;

        return response()->json([
            'Message' => 'Logined',
            'data' => $user,
            'token' => $token
        ]);
    }
}
