
@extends('web._layout.base')

@section('title', 'Login - Agn Tools')

@section('content')
    <login-component
        token="{{ @csrf_token() }}"
        action_login="{{ route('action.login') }}"
    >

    </login-component>
@endsection
