<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    public function login(Request $request)
    {
        session_start();

        // Comparar usuário com os dados do banco
        $user = User::where('email', $request->input('email'))->where('password', $request->input('password'))->first();

        //Autenticar usuário
        if(isset($user->email))
        {
            $_SESSION['email'] = $user->email;
            $_SESSION['id'] = $user->id;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('web.home');
        }
    }
}
