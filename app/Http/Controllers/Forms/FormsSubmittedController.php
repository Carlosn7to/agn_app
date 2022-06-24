<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\FormQuestion;
use App\Models\FormSubimitted;
use App\Models\FormSubmittedAnswer;
use Illuminate\Http\Request;

class FormsSubmittedController extends Controller
{
    public function create(Request $request)
    {
        // Busca as perguntas vinculadas ao formulário
        $formQuestions = FormQuestion::where('form_id', $request->input('form_id'))->select('id', 'question')->get();

        $formSubmitted = FormSubimitted::create([
            'status_id' => 1,
            'worksheet_id' => $request->input('worksheet_id'),
            'form_id' => $request->input('form_id'),
            'user_id' => $request->input('user_id'),
        ]);

        // Percorre as perguntas em busca do ID para comparar com NAME dos inputs que vieram do formulário (cliente)
        foreach($formQuestions as $valor){

            // Se o name do input for igual ao id da pergunta, acontece a inserção no banco de dados, se não, é ignorado.
            if($request->has($valor->id)){

                FormSubmittedAnswer::create([
                    'status_id' => 1,
                    'worksheet_id' => $request->input('worksheet_id'),
                    'form_id' => $request->input('form_id'),
                    'form_submitted_id' => $formSubmitted->id,
                    'user_id' => $request->input('user_id'),
                    'question_id' => $valor->id,
                    'answer' => $request->input($valor->id, ' ')
                ]);

            }

        }

        return redirect()->route('app.worksheets');



    }


    public function teste(Request $request)
    {
        return 'oi';
    }
}
