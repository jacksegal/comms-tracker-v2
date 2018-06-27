<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    {{-- SubArea --}}
    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Sub-Area',
        'model' => $subArea,
        'type' => 'text',
    ])

    {{-- Area --}}
    @include('components.form._input-select-one', [
        'name' => 'area',
        'label' => 'Area',
        'options' => [
            'collection' => $areas,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($subArea) ? $subArea : false,
            'key' => 'area_id',
            'value' => 'id',
        ],
    ])

    {{-- Tag --}}
    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $subArea,
        'type' => 'text',
    ])

    {{-- Submit --}}
    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/subareas',
    ])

</form>