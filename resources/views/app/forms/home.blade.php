
@extends('app._layout.base')

@section('title', 'Formulários - Agn Tools')

@section('content')

    <forms-app-component
    actions_new="{{ route('forms.new') }}"
    token="{{ @csrf_token() }}"
    get_forms="{{ route('api.form.list') }}"
    get_questions="{{ route('api.questions.list') }}"
    ></forms-app-component>
@endsection
