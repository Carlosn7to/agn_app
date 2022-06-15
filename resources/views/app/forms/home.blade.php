
@extends('app._layout.base')

@section('title', 'Formulários - Agn Tools')

@section('content')

    <forms-app-component
    actions_new="{{ route('forms.new') }}"
    token="{{ @csrf_token() }}"
    get_forms="{{  }}"
    ></forms-app-component>
@endsection
