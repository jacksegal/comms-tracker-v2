@extends('layouts.model')

@section('model-content')

    @include('audience._form', [
            'route' => '/audiences',
            'buttonLabel' => 'Create Audience',
    ])

@endsection