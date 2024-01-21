<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function cadastrarUsuario(Request $request)
    {
        $dadosUsuario = $request->only(['email', 'password']);
        $dadosUsuario['password'] = Hash::make($dadosUsuario['password']);

        $usuario = User::create($dadosUsuario);

        return response()->json(['mensagem' => 'Usuário cadastrado com sucesso', 'usuario' => $usuario]);
    }



}
