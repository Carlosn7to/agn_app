
@extends('app._layout.base')

@section('title', 'Planilhas - Age Tools')

@section('content')

    <worksheets
        authorization="{{ $_SESSION['token'] }}"
        api_worksheets_list="{{ route('api.worksheets.list') }}"
        api_worksheet_answers="{{ route('api.worksheet.answers') }}"
        api_questions_list="{{ route('api.questions.only') }}"
    />

@endsection
