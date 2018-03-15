<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}


    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Audience',
        'model' => $audience,
        'type' => 'text',
    ])

    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $audience,
        'type' => 'text',
    ])


    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/audiences',
    ])

</form>