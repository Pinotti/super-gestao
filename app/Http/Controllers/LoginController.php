<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (Request $request)
    {
        dd($request);
        $msg = '';
        
        if ($request->get('erro') == 1) {
            $msg = 'Usuário e/ou senha inválidos';
        }

        return view('site.login', ['erro' => $msg]);
    }

    public function autenticar (Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $texto = [
            'usuario.email' => 'O campo usuário (email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $texto);

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', md5($senha))->get()->first();

        if (isset($usuario->name)) {
            echo 'Usuário existe';
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }


    }
}
