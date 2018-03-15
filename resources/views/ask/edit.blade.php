@extends('layouts.model')

@section('model-content')

    @include('ask._form', [
        'route' => '/asks/'.$ask->id,
        'buttonLabel' => 'Update Ask',
    ])

@endsection