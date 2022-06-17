<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormQuestion;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {

        return view('app.forms.home');



    }

    public function new(Request $request)
    {
        return dd($request);
    }

    public function index()
    {
        $form = Form::with('questions')->with('status')->with('users')->get();

        return response($form, 200);
    }


    public function questions_index(Request $request, $id)
    {

        // Trás as perguntas e as respostas que estão disponíveis no formulário

        $questions = FormQuestion::where('form_id', $id)->with('answers')->get();

        return response($questions, 200);

    }

}
