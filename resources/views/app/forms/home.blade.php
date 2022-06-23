
@extends('app._layout.base')

@section('title', 'Formulários - Age Tools')

@section('content')

    <forms-app-component
    new_form="{{ route('api.form.new') }}"
    token="{{ @csrf_token() }}"
    get_forms="{{ route('api.form.list') }}"
    get_questions="{{ route('api.questions.list') }}"
    new_form_submitted="{{ route('api.form-submitted.create') }}"
    user_id="{{ $_SESSION['id'] }}"
    authorization="{{ $_SESSION['token'] }}"
    ></forms-app-component>
@endsection
