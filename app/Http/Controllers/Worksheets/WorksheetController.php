<?php

namespace App\Http\Controllers\Worksheets;

use App\Http\Controllers\Controller;
use App\Models\WorkSheet;
use App\Models\FormSubmittedAnswer;
use Illuminate\Http\Request;

class WorksheetController extends Controller
{
    public function index()
    {
        return view('app.worksheets.worksheet');
    }

    public function list(Request $request)
    {
        $worksheet = WorkSheet::select('id', 'name', 'status_id', 'user_id')->where('status_id', 1)->with('users')->with('status')->get();

        return response()->json($worksheet);
    }

    public function list_answers(Request $request, $id)
    {

        $worksheet = WorkSheet::where('id', $id)->select('id', 'name', 'user_id', 'status_id')->with('formsSubmitteds')->first();


        return response()->json($worksheet);
    }
}
