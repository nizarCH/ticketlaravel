<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;




class Authcontroller extends Controller
{
    //
    public function register(Request $request)
    {
        $fields = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'num_tel' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',

        ]);
        $user = User::create([
            'nom' => $fields['nom'],
            'prenom' => $fields['prenom'],
            'num_tel' => $fields['num_tel'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),


        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
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
        // check email
        $user = User::where('email', $fields['email'])->first();

        // check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    // public function logout(Request $request)
    // {
    //     auth()->user()->tokens()->delete();
    //     return [
    //         'messagge' => 'logged out'
    //     ];
    // }


    public function createGuest(Request $request)
    {
        $fields = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'num_tel' => 'required|string',
            'email' => 'required|string',


        ]);
        $guest = Guest::create([
            'nom' => $fields['nom'],
            'prenom' => $fields['prenom'],
            'num_tel' => $fields['num_tel'],
            'email' => $fields['email'],

        ]);
       
    }


    public function guest(Request $request)
    {
        $fields = $request->validate([

            'email' => 'required|string',
        ]);
        // check email
        $guest = Guest::where('email', $fields['email'])->first();

        // check password

        $response = [
            'guest' => $guest,
        ];
        return response($response, 201);
    }
}
