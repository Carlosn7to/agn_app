<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function forms()
    {
        return view('app.management.form');
    }
}
