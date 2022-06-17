@extends('app._layout.base')

@section('title', 'Gerenciamento - Formulários')

@section('content')

    <management-form-app-component
        get_forms_all="{{ route('api.form.all') }}"
        update_status_form="{{ route('api.form.update.status') }}"
        actions_new="{{ route('api.form.new') }}"
        get_questions="{{ route('api.questions.list') }}"
        token="{{ @csrf_token() }}"
    >

    </management-form-app-component>

@endsection
