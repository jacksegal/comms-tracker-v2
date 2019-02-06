<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}  {{ isset($class) ? $class : null }}">
    <label for="input-{{$name}}">
        {{ $label }}
        @if(isset($tooltip))
            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{$tooltip}}"></i>
        @endif
    </label>

    <select multiple class="form-control" name="{{$name}}[]" id="input-{{$name}}">

        @foreach($options['collection'] as $option)
            @if(old($name) && in_array($option->{$options['key']},old($name)))
                <option selected value="{{ $option->{$options['key']} }}">
                    {{ $option->{$options['value']} }}
                </option>
            @else
                <option {{ isset($selected['collection']) && $selected['collection'] && $selected['collection']->contains($selected['key'], $option->{$options['key']}) ? 'selected' : '' }} value="{{ $option->{$options['key']} }}">
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