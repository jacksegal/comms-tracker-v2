@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Role',
        'model' => 'role',
        'columns' => [
            ['header' => 'Role','row' => 'label'],
        ],
        'rows' => $roles,
    ])

@endsection