@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table-communication', [
        'label' => 'Communications',
        'model' => 'communication',
        'columns' => [
            ['header' => 'Title','row' => 'title'],
            ['header' => 'Basket','nested' => true, 'row1' => 'basket', 'row2' => 'label'],
            ['header' => 'Area','nested' => true, 'row1' => 'area', 'row2' => 'label'],
            ['header' => 'Sub-Area','nested' => true, 'row1' => 'subArea', 'row2' => 'label'],
            ['header' => 'Medium','nested' => true, 'row1' => 'medium', 'row2' => 'label'],
            ['header' => 'Ask','nested' => true, 'row1' => 'ask', 'row2' => 'label'],
        ],
        'rows' => $communications,
    ])

@endsection