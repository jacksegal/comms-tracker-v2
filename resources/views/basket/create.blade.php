@extends('layouts.model')

@section('model-content')

    @include('basket._form', [
        'route' => '/baskets',
        'buttonLabel' => 'Create Basket',
    ])

@endsection