@extends('layouts.model')

@section('model-content')

    @include('area._form', [
        'route' => '/areas',
        'buttonLabel' => 'Create Area',
    ])

@endsection