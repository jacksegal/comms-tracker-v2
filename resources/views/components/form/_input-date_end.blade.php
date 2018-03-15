<div class="form-inline {{ isset($class) ? $class : null }}">
    <div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
        <label for="input-{{$name}}">{{ $label }}</label>

        <div class="input-group">
            <input type="hidden" name="{{ $name }}"
                   value="{{ old($name, isset($model->{$name}) ? $model->{$name} : null) }}">
            <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
            <input class="datepicker" type="text" value="{{ old($name, isset($model->{$name}) ? $value : null) }}"
                   name="ui_{{ $name }}" data-date-input="{{ $name }}"
                   class="form-control" id="input-{{$name}}"
                   placeholder="{{ $label }}">
        </div>
        <button type="button" class="clear-date btn btn-default btn-xs" data-date-input="{{ $name }}">
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>