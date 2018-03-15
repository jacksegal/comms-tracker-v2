@extends('layouts.model')

@section('model-content')

    @include('user._form', [
        'route' => '/users/'.$user->id,
        'buttonLabel' => 'Update User',
        'displayActive' => true,
    ])

@endsection
