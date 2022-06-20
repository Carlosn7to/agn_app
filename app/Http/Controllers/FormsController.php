<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormAnswer;
use App\Models\FormQuestion;
use App\Models\HashApi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {
        return view('app.forms.home');
    }

    public function new(Request $request)
    {
        $form = Form::where('name', $request->input('name'))->where('status_id', '<>' ,2)->first();

        if(isset($form->name)) {
            return response(['message' => 'Formulário já existe!', 'type' => 'trigger']);
        } else {
            Form::create([
                'status_id' => 3,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => $request->input('user_id'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        };

        return response("formulário criado com sucesso!");


    }

    public function add_form_questions_answers(Request $request)
    {


        $question = FormQuestion::create([
                        'status_id' => $request->input('status_id'),
                        'question' => $request->input('question'),
                        'force' => $request->input('force'),
                        'type' => $request->input('type'),
                        'form_id' => $request->input('form_id'),
                        'user_id' => $request->input('user_id'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);

        if($question->question) {

            $form = Form::where('id', $question->form_id)->where('status_id', 3)->first();

            if(isset($form->name)) {
                $form = $form->update(['status_id' => 1]);
            }

                FormAnswer::create([
                    'status_id' => $request->input('status_id'),
                    'answer' => $request->input('type_answer'),
                    'form_id' => $request->input('form_id'),
                    'question_id' => $question->id,
                    'user_id' => $request->input('user_id'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

        }



        return response("Adicionado com sucesso!");
    }

    public function index()
    {
        $form = Form::where('status_id', 1)->with('questions')->with('status')->with('users')->get();

        return response($form, 200);
    }

    public function questions_index(Request $request, $id)
    {

        // Trás as perguntas e as respostas que estão disponíveis no formulário

        $questions = FormQuestion::where('form_id', $id)->where('status_id', 1)->with('answers')->get();

        return response($questions, 200);

    }

    public function get_questions_answers(Request $request)
    {

        $question_answers = FormQuestion::where('id', $request->input('question_id'))->with('answers')->first();


        return response($question_answers);
    }

    public function edit_question_status(Request $request)
    {
        $question = FormQuestion::findOrFail($request->input('question_id'));

        $question = $question->update(['status_id' => $request->input('status')]);

        return response('Ok');
    }

    public function edit_question(Request $request)
    {

        $question = FormQuestion::findOrFail($request->input('question_id'));

        $question = $question->update([
            'question' => $request->input('question'),
            'type' => $request->input('type')
        ]);

        return response('Atualizado');
    }

    public function delete_answer(Request $request)
    {
        $answer = FormAnswer::findOrFail($request->input('answer_id'));

        $answer = $answer->update([
            'status_id' => $request->input('status')
        ]);

        return response('Escolha deletada');
    }

    public function all_forms()
    {
        $form = Form::with('questions')->with('status')->with('users')->orderBy('id', 'desc')->get();

        return response($form, 200);
    }

    public function update_status_form(Request $request)
    {
        $form = Form::findOrFail($request->input('form_id'));

        if($request->input('action') === 4) {
            $form->delete();

            return response("Formulário deletado com sucesso");
        };

        $form = $form->update(['status_id' => $request->input('action')]);

        return "Formulário atualizado com sucesso.";

    }

    public function edit_form(Request $request)
    {
        $form = Form::findOrFail($request->input('form_id'));

        $form = $form->update(['name' => $request->input('name')]);

        return "Formulário atualizado com sucesso.";

    }

    public function get_form_questions_answers(Request $request)
    {

       $form = Form::where('id', $request->input('form_id'))->with('questions_answers')->get();

       return response($form, 200);

    }

}
