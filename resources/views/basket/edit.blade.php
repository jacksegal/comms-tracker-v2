@extends('layouts.model')

@section('model-content')

    @include('basket._form', [
        'route' => '/baskets/'.$basket->id,
        'buttonLabel' => 'Update Basket',
    ])


@endsection