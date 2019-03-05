<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    {{-- CampaignPush --}}
    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Push',
        'model' => $campaignPush,
        'type' => 'text',
    ])

    {{-- SubArea --}}
    @include('components.form._input-select-one', [
        'name' => 'subArea',
        'label' => 'Sub-Area',
        'options' => [
            'collection' => $subAreas,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($campaignPush) ? $campaignPush : false,
            'key' => 'sub_area_id',
            'value' => 'id',
        ],
    ])

    {{-- Tag --}}
    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $campaignPush,
        'type' => 'text',
    ])

    {{-- Submit --}}
    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/campaignpushs',
    ])

</form>