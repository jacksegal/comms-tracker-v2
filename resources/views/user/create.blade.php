@extends('layouts.model')

@section('model-content')

    @include('user._form', [
        'route' => '/users',
        'buttonLabel' => 'Create User',
        'displayActive' => false,
    ])

@endsection