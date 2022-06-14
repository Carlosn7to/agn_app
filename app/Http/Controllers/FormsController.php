<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {
        return view('app.forms.home');
    }
}
