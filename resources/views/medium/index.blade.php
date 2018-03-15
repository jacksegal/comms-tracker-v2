@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Medium',
        'model' => 'medium',
        'columns' => [
            ['header' => 'Medium','row' => 'label'],
        ],
        'rows' => $mediums,
    ])

@endsection