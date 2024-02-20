<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request) {
        
        if(Auth::attempt(
            [
                'email' => $request['email'],
                'password' => $request['password']
            ],
            $request['remember'])
            ) {

            $user = User::find(Auth::user()->id);
            $user->token = $user->createToken("robloxToken");

            return response()->json($user );
        } else {
            $data = array(
                'message' => 'Por favor verifique su usuario y contraseña',
            );

            return response()->json($data );
        }
    }
}
