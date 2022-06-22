<?php

namespace App\Http\Controllers\Worksheets;

use App\Http\Controllers\Controller;
use App\Models\WorkSheets;
use Illuminate\Http\Request;

class WorksheetController extends Controller
{
    public function index()
    {
        return view('app.worksheets.worksheet');
    }

    public function list(Request $request)
    {
        $worksheet = WorkSheets::select('id', 'name', 'status_id', 'form_id', 'user_id')->where('status_id', 1)->with('users')->with('status')->get();

        return response()->json($worksheet);
    }
}
