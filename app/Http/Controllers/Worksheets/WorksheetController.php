<?php

namespace App\Http\Controllers\Worksheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorksheetController extends Controller
{
    public function index()
    {
        return view('app.worksheets.worksheet');
    }
}
