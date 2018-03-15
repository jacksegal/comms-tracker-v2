@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Basket',
        'model' => 'basket',
        'columns' => [
            ['header' => 'Basket','row' => 'label'],
        ],
        'rows' => $baskets,
    ])

@endsection