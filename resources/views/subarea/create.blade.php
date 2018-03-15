@extends('layouts.model')

@section('model-content')

    @include('subarea._form', [
        'route' => '/subareas',
        'buttonLabel' => 'Create Sub-Area',
    ])

@endsection