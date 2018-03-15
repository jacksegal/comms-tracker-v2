@extends('layouts.model')

@section('model-content')

    @include('role._form', [
        'route' => '/roles/'.$role->id,
        'buttonLabel' => 'Edit Role',
    ])

@endsection