@extends('layouts.model')

@section('model-content')

    @include('ask._form', [
            'route' => '/asks',
            'buttonLabel' => 'Create Ask',
    ])

@endsection