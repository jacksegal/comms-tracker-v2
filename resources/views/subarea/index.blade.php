@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Sub-Area',
        'model' => 'subarea',
        'columns' => [
            [
            	'header' => 'Sub-Area',
            	'row' => 'label'
            ],
            [
            	'header' => 'Area',
            	'nested' => true,
            	'row1' => 'area',
            	'row2' => 'label', 
            ],
            [
                'header' => 'Tag',
                'row' => 'tag'
            ],
        ],
        'rows' => $subAreas,
    ])

@endsection