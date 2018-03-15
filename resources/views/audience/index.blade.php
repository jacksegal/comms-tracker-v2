@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Audience',
        'model' => 'audience',
        'columns' => [
            ['header' => 'Audience','row' => 'label'],
            ['header' => 'Tag','row' => 'tag'],
        ],
        'rows' => $audiences,
    ])

@endsection