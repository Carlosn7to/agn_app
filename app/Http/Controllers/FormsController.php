<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormQuestion;
use App\Models\HashApi;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {

        return view('app.forms.home');



    }

    public function new(Request $request)
    {


        Form::create($request->all());

        return response("formulário criado com sucesso!");


    }

    public function index()
    {
        $form = Form::where('status_id', 1)->with('questions')->with('status')->with('users')->get();

        return response($form, 200);
    }

    public function questions_index(Request $request, $id)
    {

        // Trás as perguntas e as respostas que estão disponíveis no formulário

        $questions = FormQuestion::where('form_id', $id)->with('answers')->get();

        return response($questions, 200);

    }

    public function all_forms()
    {
        $form = Form::with('questions')->with('status')->with('users')->get();

        return response($form, 200);
    }

    public function update_status(Request $request, $action, $id)
    {
        $form = Form::findOrFail($id);

        $form = $form->update(['status_id' => $action]);

        return "Formulário atualizado com sucesso.";

    }

    public function get_form_questions_answers(Request $request)
    {

       $form = Form::where('id', $request->input('form_id'))->with('questions_answers')->get();

       return response($form, 200);

    }

}
