<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    protected function credentials(Request $request){
        return [
            'email' => strtoupper($request->input('email')),
            'password' => $request->input('password')
        ];
    }

    public function login(Request $request){
        $credentials = $this->credentials($request);
        if( !Auth::attempt($credentials )){
            return \response()->json(["mensaje"=> "Usuario es incorrecto", "state"=> 401], 200);
        }

        $accesToken = Auth::user()->createToken('authTestToken')->accessToken;

        $user = [
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'token' => $accesToken
        ];

        return \response()->json([
            'user' => $user,
            'state' => 200
        ], 200);

    }
}
