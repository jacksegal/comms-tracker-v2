<script>
    $(function () {

        /* create JS objects */
        var areasByBasket = {!! $areasByBasket !!};
        var subAreasByArea = {!! $subAreasByArea !!};

        console.log('areasByBasket', areasByBasket);
        console.log('subAreasByArea', subAreasByArea);

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


        $('.datepicker').datepicker().on('changeDate', function (e) {
            var startDateCompare = $('#input-start_date').datepicker('getUTCDate');
            var endDateCompare = $('#input-end_date').datepicker('getUTCDate');

            if(startDateCompare && endDateCompare && !moment(startDateCompare).isSameOrBefore(endDateCompare)){
            
                $(e.currentTarget).datepicker('clearDates');
                //$(e.currentTarget).closest('.form-group').addClass('has-error').append('<span class="help-block">Start date must be BEFORE End date</span>');
            }
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
                'label' => 'Title*',
                'model' => $communication,
                'type' => 'text',
                'required' => 'required',
            ])

            {{-- Medium --}}
            @include('components.form._input-select-one', [
                'name' => 'medium_id',
                'label' => 'Medium*',
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
               'label' => 'Start Date*',
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
                <label for="input-date_flexibility">Date Flexibility*</label>
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
                'label' => 'Basket*',
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
                'label' => 'Area*',
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

            {{-- Push --}}
            @include('components.form._input-text', [
               'name' => 'push',
               'label' => 'Push',
               'model' => $communication,
               'type' => 'text',
            ])

            {{-- Description --}}
            @include('components.form._input-textarea', [
               'name' => 'description',
               'label' => 'Description*',
               'model' => $communication,
            ])


            {{-- Audience --}}
            @include('components.form._input-select-many', [
                'name' => 'audiences',
                'label' => 'Audience*',
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
                'tooltip' => 'You can select more than one – the logic is AND, e.g. signers AND geographic',
            ])

            {{-- Approx Recipients --}}
            @include('components.form._input-text', [
               'name' => 'approx_recipients',
               'label' => 'Approx. Recipients*',
               'model' => $communication,
               'type' => 'text',
            ])


            {{-- Ask --}}
            @include('components.form._input-select-one', [
                'name' => 'ask_id',
                'label' => 'Ask*',
                'options' => [
                    'collection' => $asks,
                    'key' => 'id',
                    'value' => 'label',
                ],
                'selected' => [
                    'collection' => isset($communication) ? $communication : false,
                    'key' => 'ask_id',
                    'value' => 'id',
                    'placeholder' => 'Select an Ask',
                ],
                'class' => 'email-only',
                'tooltip' => 'What is the main ask in your email (if there are several asks please select the main or first one)',
            ])

            {{-- Are there two asks in the email? --}}
            @include('components.form._input-radio', [
                'name' => 'alt_ask',
                'label' => 'Is there more than one ask in the email, e.g. Share or Donate?',
                'options' => [
                    [
                        'value' => 'No',
                        'key' => '0',
                    ],
                    [
                        'value' => 'Yes',
                        'key' => '1',
                    ],
                ],
                'model' => $communication,
                'class' => 'email-only',
            ])

            {{-- Is the email a reminder to a previous ask? --}}
            @include('components.form._input-radio', [
                'name' => 'reminder',
                'label' => 'Is the email a reminder to a previous ask?',
                'options' => [
                    [
                        'value' => 'No',
                        'key' => '0',
                    ],
                    [
                        'value' => 'Reminder 1',
                        'key' => '1',
                    ],
                    [
                        'value' => 'Reminder 2',
                        'key' => '2',
                    ],
                    [
                        'value' => 'Reminder 3+',
                        'key' => '3',
                    ],
                ],
                'model' => $communication,
                'class' => 'email-only',
            ])

            {{-- Is the email going to a sample of your audience only (e.g. for a test)--}}
            {{-- @include('components.form._input-radio', [
                'name' => 'sample',
                'label' => 'Is the email going to a sample of your audience only (e.g. for a test)',
                'options' => [
                    [
                        'value' => 'No',
                        'key' => '0',
                    ],
                    [
                        'value' => 'Yes',
                        'key' => '1',
                    ],
                ],
                'model' => $communication,
            ])--}}

            {{-- Notes --}}
            @include('components.form._input-textarea', [
               'name' => 'notes',
               'label' => 'Other Notes',
               'model' => $communication,
            ])

            {{-- Data Selection --}}
            <div class="checkbox">
                <label>
                    <input value="1" type="checkbox"
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
                    'collection' => ($communication) ? $communication : Auth::user(),
                    //'key' => 'user_id',
                    'key' => ($communication) ? 'user_id' : 'id',
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


<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })    
</script>