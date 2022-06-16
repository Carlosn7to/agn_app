<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormQuestion;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {
        //$form = Form::with('questions')->with('icons')->with('answers')->first();

        return view('app.forms.home');

    }

    public function new(Request $request)
    {
        return dd($request);
    }

    public function index()
    {
        $form = Form::with('questions')->with('icons')->get();

        return response($form,200);
    }
}
