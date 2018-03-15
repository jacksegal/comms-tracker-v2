@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Ask',
        'model' => 'ask',
        'columns' => [
            ['header' => 'Ask','row' => 'label'],
            ['header' => 'Tag','row' => 'tag'],
        ],
        'rows' => $asks,
    ])

@endsection