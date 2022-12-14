<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function me(){
        return [
            'Nis' => 3103120211,
            'Name' => 'Shinta Nuriyah',
            'Phone' => '0812260888',
            'Class' => 'XII RPL 7'
        ];
    }

    public function register(Request $request)
    {
    $fields = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password'])
    ]);

    $token = $user->createToken('tokennih')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
}

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check Password
        if (!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'anauthorized'
            ], 401);
        }

        $token = $user->createToken('tokennih')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    // logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}