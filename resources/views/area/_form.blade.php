<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    {{-- Area --}}
    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Area',
        'model' => $area,
        'type' => 'text',
    ])

    {{-- Basket --}}
    @include('components.form._input-select-one', [
        'name' => 'basket',
        'label' => 'Basket',
        'options' => [
            'collection' => $baskets,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($area) ? $area : false,
            'key' => 'basket_id',
            'value' => 'id',
        ],
    ])

    {{-- Tag --}}
    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $area,
        'type' => 'text',
    ])

    {{-- Submit --}}
    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/areas',
    ])

</form>