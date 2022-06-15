<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormQuestion;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {
        $form = Form::all();

        return view('app.forms.home', ['forms' => $form]);
    }

    public function new(Request $request)
    {
        return dd($request);
    }

    public function index()
    {
        $form = Form::all();

        return response($form,200);
    }
}
