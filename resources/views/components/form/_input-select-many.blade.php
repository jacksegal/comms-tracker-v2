<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}  {{ isset($class) ? $class : null }}">
    <label for="input-{{$name}}">{{ $label }}</label>

    <select multiple class="form-control" name="{{$name}}[]" id="input-{{$name}}">

        @foreach($options['collection'] as $option)

            <option {{ isset($selected['collection']) && $selected['collection'] && $selected['collection']->contains($selected['key'], $option->{$options['key']}) ? 'selected' : '' }} value="{{ $option->{$options['key']} }}">
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