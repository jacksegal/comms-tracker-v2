@extends('layouts.model')

@section('model-content')

    @include('audience._form', [
        'route' => '/audiences/'.$audience->id,
        'buttonLabel' => 'Update Audience',
    ])

@endsection