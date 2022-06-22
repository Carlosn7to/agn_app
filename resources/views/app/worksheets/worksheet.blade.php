
@extends('app._layout.base')

@section('title', 'Planilhas - Age Tools')

@section('content')

    <worksheets
        authorization="{{ $_SESSION['token'] }}"
        api_worksheets_list="{{ route('api.worksheets.list') }}"
    />

@endsection
