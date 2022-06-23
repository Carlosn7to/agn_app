<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormAnswer;
use App\Models\FormQuestion;
use App\Models\WorkSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function home()
    {
        return view('app.forms.home');
    }

    public function create(Request $request)
    {
        $form = Form::where('name', $request->input('name'))->where('status_id', '<>' ,2)->first();

        if(isset($form->name)) {
            return response(['message' => 'Formulário já existe!', 'type' => 'trigger']);

        } else {

            $worksheet = WorkSheet::create([
                'status_id' => 3,
                'name' => $request->input('name'),
                'user_id' => $request->input('user_id')
            ]);


            $form = Form::create([
                        'status_id' => 3,
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'user_id' => $request->input('user_id'),
                        'worksheet_id' => $worksheet->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);



        };

        return response($worksheet);

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

                $worksheet = WorkSheet::where('id', $form->worksheet_id)->first();

                $worksheet->update(['status_id' => 1]);

                $form = $form->update(['status_id' => 1]);

            }

            if($request->input('type') === 'radio'){

                return response()->json($question->id);

            } else {

                $formAnswer =   FormAnswer::create([
                    'status_id' => $request->input('status_id'),
                    'answer' => '',
                    'form_id' => $request->input('form_id'),
                    'question_id' => $question->id,
                    'user_id' => $request->input('user_id'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                return response($formAnswer);
            }

          }

        return response("Adicionado com sucesso!");
    }

    public function index()
    {
        $form = Form::where('status_id', 1)->with('questions')->with('status')->with('users')->get();

        return response($form, 200);
    }

    public function get_questions(Request $request, $id)
    {
        // Trás as perguntas que estão disponíveis no formulário

        $questions = FormQuestion::where('form_id', $id)->select('id', 'question')->get();

        return response($questions, 200);

    }

    public function questions_index(Request $request, $id)
    {

        // Trás as perguntas e as respostas que estão disponíveis no formulário

        $questions = FormQuestion::where('form_id', $id)->with('answers')->get();

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

    public function new_answer(Request $request)
    {

        $request = $request->only('status_id', 'answer', 'form_id', 'question_id', 'user_id');


        $answer = FormAnswer::create($request);

        return response()->json($answer->question_id);


        return response()->json('nova escolha radio');
    }

}
