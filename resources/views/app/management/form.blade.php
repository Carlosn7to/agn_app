@extends('app._layout.base')

@section('title', 'Gerenciamento - Formulários')

@section('content')

    <management-form-app-component
        get_forms_all="{{ route('api.form.all') }}"
        update_status_form="{{ route('api.form.update.status') }}"
        form_new="{{ route('api.form.new') }}"
        get_questions="{{ route('api.questions.list') }}"
        token="{{ @csrf_token() }}"
        user_id="{{ $_SESSION['id'] }}"
        get_form_questions_answers="{{ route('api.form.questions.answers') }}"
    >

    </management-form-app-component>

@endsection
