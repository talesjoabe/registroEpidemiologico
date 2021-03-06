<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:11',
            'data_de_nascimento' => 'required|date',
            'municipio_id' => 'required|int',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'data_de_nascimento' => $request->data_de_nascimento,
            'municipio_id' => $request->municipio_id,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token' => $token], 200);
    }
}
