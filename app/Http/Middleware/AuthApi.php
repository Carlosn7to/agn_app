<?php

namespace App\Http\Middleware;

use App\Models\AuthToken;
use App\Models\HashApi;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->header('auth')){

            $token = AuthToken::where('_token', $request->header('auth'))->first();

            if($token->user) {

               return $next($request);

            } else {
                return response('usuário inválido');
            }


        } else {
            return response([
                'mensagem' => 'token inválido',
                '_token' => $request->header('auth')
            ]);
        }

    }
};
