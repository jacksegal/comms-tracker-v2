<script>
    $(function () {

        /* create JS objects */
        var areasByBasket = {!! $areasByBasket !!};
        var subAreasByArea = {!! $subAreasByArea !!};

        /* listen to basket select change */
        $('select[name="basket"]').change(function () {
            var selected = getSelectedOption(this);
            var myArr = areasByBasket[selected][0].areas;
            updateSelectOptions('select[name="area"]', myArr);
            $('select[name="area"]').change();
            $('select[name="area"]').val('').trigger('change.select2');
        });

        /* listen to area select change */
        $('select[name="area"]').change(function () {
            var selected = getSelectedOption(this);
            var myArr = subAreasByArea[selected][0].sub_areas;
            updateSelectOptions('select[name="subarea"]', myArr);
            $('select[name="subarea"]').val('').trigger('change.select2');
        });


        /* check current Medium */
        updateEmailProfile();

        /* listen to Medium select change */
        $('#input-medium_id').change(function () {
            updateEmailProfile();
        });

        function updateEmailProfile() {

            if (isMediumEmail()) {
                $('.email-not').hide();
                $('.email-only').show();
            } else {
                $('.email-not').show();
                $('.email-only').hide();
            }
        }

        function isMediumEmail() {
            if ($("#input-medium_id").val() === '1') {
                return true;
            } else {
                return false;
            }
        }


    });

    function getSelectedOption(select) {
        return $(select).find(':selected').text().trim();
    }

    function updateSelectOptions(select, options) {

        $(select).children('option').remove();

        $.each(options, function (key, value) {
            $(select).append($("<option></option>").attr("value", value.id).text(value.label));
        });
    }
</script>

<script>
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });

        $('.datepicker').datepicker().on('changeDate', function (e) {
            var input = $(this).attr('data-date-input');
            var ident = 'input[name="' + input + '"]';
            $(ident).val(e.format('yyyy-mm-dd'));
        });

        $('.clear-date').click(function(e){
            var input = $(this).attr('data-date-input');
            var ident = 'input[name="' + input + '"]';
            $(ident).val('');
            $('.datepicker[data-date-input="'+input+'"]').datepicker('clearDates');
        });
    });
</script>

<div class="row">
    <div class="col-md-8 col-md-offset-2">


        <form method="POST" action="{{ $route }}">

            {{ csrf_field() }}

            {{-- Title --}}
            @include('components.form._input-text', [
                'name' => 'title',
                'label' => 'Title',
                'model' => $communication,
                'type' => 'text',
            ])

            {{-- Medium --}}
            @include('components.form._input-select-one', [
                'name' => 'medium_id',
                'label' => 'Medium',
                'options' => [
                    'collection' => $mediums,
                    'key' => 'id',
                    'value' => 'label',
                ],
                'selected' => [
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'medium_id',
                    'value' => 'id',
                ],
            ])


            {{-- Start Date --}}
            @include('components.form._input-date', [
               'name' => 'start_date',
               'value' => isset($communication->start_date) ? $communication->getStartDate() : '',
               'label' => 'Start Date',
               'model' => $communication,
            ])



            {{-- End Date --}}
            @include('components.form._input-date_end', [
               'name' => 'end_date',
               'value' => isset($communication->end_date) ? $communication->getEndDate() : '',
               'label' => 'End Date',
               'model' => $communication,
               'class' => 'email-not',
            ])

            {{-- Date Flexibility --}}
            <div class="form-group {{ $errors->has('date_flexibility') ? ' has-error' : '' }}">
                <label for="input-date_flexibility">date_flexibility</label>
                <select class="form-control" name="date_flexibility" id="input-date_flexibility">
                    <option {{ (isset($communication->date_flexibility) && $communication->date_flexibility == 'Very flexible') ? 'selected' : '' }} value="Very flexible">
                        Very flexible
                    </option>
                    <option {{ (isset($communication->date_flexibility) && $communication->date_flexibility == 'A bit flexible') ? 'selected' : '' }} value="A bit flexible">
                        A bit flexible
                    </option>
                    <option {{ (isset($communication->date_flexibility) && $communication->date_flexibility == 'Fixed (unless outside events change)') ? 'selected' : '' }} value="Fixed (unless outside events change)">
                        Fixed (unless outside events change)
                    </option>
                </select>

                @if ($errors->has('date_flexibility'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_flexibility') }}</strong>
                    </span>
                @endif
            </div>


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
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'basket_id',
                    'value' => 'id',
                    'placeholder' => 'Select a Basket',
                ],
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
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'area_id',
                    'value' => 'id',
                    'placeholder' => 'Select an Area',
                ],
            ])

            {{-- Sub Area --}}
            @include('components.form._input-select-one', [
                'name' => 'subarea',
                'label' => 'Sub-Area',
                'options' => [
                    'collection' => $subAreas,
                    'key' => 'id',
                    'value' => 'label',
                ],
                'selected' => [
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'sub_area_id',
                    'value' => 'id',
                    'placeholder' => 'Select a Sub Area',
                ],
            ])

            {{-- Description --}}
            @include('components.form._input-textarea', [
               'name' => 'description',
               'label' => 'Description',
               'model' => $communication,
            ])


            {{-- Audience --}}
            @include('components.form._input-select-many', [
                'name' => 'audiences',
                'label' => 'Audience',
                'options' => [
                    'collection' => $audiences,
                    'key' => 'id',
                    'value' => 'label',
                ],
                'selected' => [
                    'collection' => isset($communication) && $communication ? $communication->audiences : false,
                    'key' => 'id',
                    'value' => 'id',
                ],
                'class' => 'email-only',
            ])

            {{-- Approx Recipients --}}
            @include('components.form._input-text', [
               'name' => 'approx_recipients',
               'label' => 'approx_recipients',
               'model' => $communication,
               'type' => 'number',
            ])


            {{-- Ask --}}
            @include('components.form._input-select-one', [
                'name' => 'ask_id',
                'label' => 'Ask',
                'options' => [
                    'collection' => $asks,
                    'key' => 'id',
                    'value' => 'label',
                ],
                'selected' => [
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'ask_id',
                    'value' => 'id',
                ],
                'class' => 'email-only',
            ])

            {{-- Alternative Ask? --}}


            {{-- Notes --}}
            @include('components.form._input-textarea', [
               'name' => 'notes',
               'label' => 'Other Notes',
               'model' => $communication,
            ])

            {{-- Data Selection --}}
            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           name="data_selection" {{ isset($communication) && $communication && ($communication->data_selection === 1) ? 'checked' : '' }}>
                    Data
                    selection
                    required for this Communication
                </label>
            </div>


            {{-- BSD Tag --}}
            <label>BSD Email Tag (auto generated)</label>
            <input style="width: 100%;" type="text" disabled="disabled"
                   value="{{ isset($communication) && $communication ? $communication->bsd_tag : '' }}">


            {{-- Created By --}}
            @include('components.form._input-select-one', [
                'name' => 'user_id',
                'label' => 'Created By',
                'options' => [
                    'collection' => $users,
                    'key' => 'id',
                    'value' => 'email',
                ],
                'selected' => [
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'user_id',
                    'value' => 'id',
                ],
            ])

            @include('components.form._button_group', [
                'label' => $buttonLabel,
                'cancel' => '/communications',
            ])

        </form>
    </div>

</div>