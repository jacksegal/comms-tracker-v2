<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}


    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Medium',
        'model' => $medium,
        'type' => 'text',
    ])


    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/mediums',
    ])

</form>