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
        edit_form="{{ route('api.form.edit') }}"
        new_question="{{ route('api.form.add.questions') }}"
        get_question_answers="{{ route('api.questions.answers') }}"
        edit_question_status="{{ route('api.questions.edit.status') }}"
        edit_question="{{ route('api.questions.edit') }}"
        delete_answer="{{ route('api.answers.delete') }}"
        new_answer_radio="{{ route('api.answer.new') }}"
        _token="{{ $_SESSION['token'] }}"

    >

    </management-form-app-component>

@endsection
