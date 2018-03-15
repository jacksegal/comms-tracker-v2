@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Area',
        'model' => 'area',
        'columns' => [
            ['header' => 'Area','row' => 'label'],
            ['header' => 'Basket','nested' => true,'row1' => 'basket','row2' => 'label', ],
        ],
        'rows' => $areas,
    ])

@endsection