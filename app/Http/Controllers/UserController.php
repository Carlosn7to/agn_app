<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(Request $request, $id)
    {
        $user = User::find($id)->with('occupations')->first();

        return response($user,200);
    }
}
