<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(Request $request, $id)
    {
        $user = User::find($id)->with('occupations')->select('id', 'email', 'first_name')->first();

        return response($user,200);
    }
}
