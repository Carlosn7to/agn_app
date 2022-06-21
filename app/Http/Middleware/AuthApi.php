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

        if($request->header('_token')){

            $token = AuthToken::where('_token', $request->header('_token'))->first();

            if($token->user) {

               return $next($request);

            } else {
                return response('usuário inválido');
            }


        } else {
            return response('token inválido');
        }

        return response($result);

//        if ($request->has('_token')) {
//
//            $token = \App\Models\AuthToken::where('status_id', 1)
//                ->where('token', $request->input('_token'))
//                ->where('user', $request->input('user'))
//                ->first();
//
//            if (Hash::check($request->input('password'), $token->password)) {
//
//                return $next($request);
//
//            } else {
//                return response('Data invalid[2]!');
//            }
//
//        };
//
//        return response('Data invalid[1]!');

    }
};
