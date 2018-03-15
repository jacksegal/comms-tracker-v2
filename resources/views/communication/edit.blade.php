@extends('layouts.model')

@section('model-content')

    @include('communication._form', [
        'route' => '/communications/'.$communication->id,
        'buttonLabel' => 'Update Communication',
    ])

@endsection