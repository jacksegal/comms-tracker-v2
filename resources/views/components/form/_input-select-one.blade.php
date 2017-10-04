<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="input-{{$name}}">{{ $label }}</label>

    <select class="form-control" name="{{$name}}" id="input-{{$name}}">

        @foreach($options['collection'] as $option)

            <option {{ isset($selected['collection']) && $selected['collection'] && $selected['collection']->{$selected['key']} === $option->{$selected['value']} ? 'selected' : '' }} value="{{ $option->{$options['key']} }}">
                {{ $option->{$options['value']} }}
            </option>

        @endforeach

    </select>

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>