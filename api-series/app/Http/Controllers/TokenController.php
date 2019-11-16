<?php

namespace App\Http\Controllers;

use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TokenController extends \App\Http\Controllers\Controller
{

    public function gerarToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email);

        if (is_null($usuario) || !Hash::check($request->password, $usuario->password)) {
            return response()->json('ERRO!', 401);
        }

        $token = JWT::encode(
            ['email' => $request->email],
            env('JWT_KEY')
        );

        return ['access_token' => $token];
    }
}
