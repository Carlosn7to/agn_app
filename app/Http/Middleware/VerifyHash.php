<?php

namespace App\Http\Middleware;

use App\Models\HashApi;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerifyHash
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

        if ($request->has('hash')) {

            $hash = HashApi::where('status_id', 1)
                ->where('hash', $request->input('hash'))
                ->where('user', $request->input('user'))
                ->first();

            if (Hash::check($request->input('password'), $hash->password)) {

                return $next($request);

            } else {
                return response('Senha incorreta!');
            };

        };

        return response('Erro 1');

    }
};
