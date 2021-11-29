<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index() {
        return User::latest()->get();
    }

    public function signup(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
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
    public function signout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'Sing Out']);
    }

    public function login(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['massage'=> 'Bad Login'], 404);
        }

        $token = $user->createToken('MyToken')->plainTextToken;

        return response()->json([
            'Message' => 'Created',
            'data' => $user,
            'token' => $token
        ], 201);
    }
}

//  1|k6juAU9DrydV5M9n7NP0XvzeFzHtI0IBOO7ybpRg

// 5|kmqBrnpEeet6HI3Hhj0z9ZFFhjfPVryzwx5ccuMW

// Vannda:  6|cejCYjZSnJkVfxkvjmw53gcGzhO0w93Gkdn4xvwD