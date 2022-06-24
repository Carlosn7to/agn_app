<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\FormQuestion;
use App\Models\FormSubimitted;
use App\Models\FormSubmittedAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormsSubmittedController extends Controller
{
    public function create(Request $request)
    {
        // Busca as perguntas vinculadas ao formulário
        $formQuestions = FormQuestion::where('form_id', $request->input('form_id'))->select('id', 'question')->get();

        // Cria um formulário sumbmetido
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
//        $formSubAns = FormSubmittedAnswer::where('question_id', $request->input('question_id'))->select('form_submitted_id')->distinct()->get();
//
//        //return $formSubAns->form_submitted_id;
//
//        foreach($formSubAns as $form ) {
//
//            $formSub = FormSubimitted::where('id', '<>' , $form->form_submitted_id)->get();
//
////            $formSubAns = FormSubmittedAnswer::create([
////                'status_id' => 1,
////                'worksheet_id' => 1,
////                'form_id' => 1,
////                'form_submitted_id' => $formSub->id,
////                'question_id' => $request->input('question_id'),
////                'user_id' => 1,
////                'answer' => ' ',
////            ]);
//
//
//            echo $formSub."<br><br>";
//            echo $formSubAns."<br><br>";
//
//
//        }

    }

}
