<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}  {{ isset($class) ? $class : null }}">
    <label for="input-{{$name}}">
        {{ $label }}
        @if(isset($tooltip))
            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{$tooltip}}"></i>
        @endif
    </label>

    <select class="form-control" name="{{$name}}" id="input-{{$name}}">

        @foreach($options['collection'] as $option)
            @if(isset($selected['placeholder']))
                <option></option>
            @endif

            @if(old($name, 'default') == $option->{$options['key']})
                <option selected data-test="true" value="{{ $option->{$options['key']} }}">
                    {{ $option->{$options['value']} }}
                </option>
            @else
                <option {{ isset($selected['collection']) && $selected['collection'] && $selected['collection']->{$selected['key']} === $option->{$selected['value']} ? 'selected' : '' }} value="{{ $option->{$options['key']} }}">
                    {{ $option->{$options['value']} }}
                </option>            
            @endif

        @endforeach

    </select>

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>

@if(isset($selected['placeholder']))
    <script>
        $(document).ready(function () {
            $('#input-{{$name}}').select2({
                placeholder: "{{ $selected['placeholder'] }}",
            });
        });
    </script>
@endif