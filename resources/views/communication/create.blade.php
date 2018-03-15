@extends('layouts.model')

@section('model-content')

    @include('communication._form', [
        'route' => '/communications',
        'buttonLabel' => 'Create Communication',
    ])


@endsection