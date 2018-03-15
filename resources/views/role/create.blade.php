@extends('layouts.model')

@section('model-content')

    @include('role._form', [
        'route' => '/roles',
        'buttonLabel' => 'Create Role',
    ])

@endsection