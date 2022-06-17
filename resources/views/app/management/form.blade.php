@extends('app._layout.base')

@section('title', 'Gerenciamento - Formulários')

@section('content')

    <management-form-app-component
        get_forms="{{ route('api.form.list') }}"
    >

    </management-form-app-component>

@endsection
