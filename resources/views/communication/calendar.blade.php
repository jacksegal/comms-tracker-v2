@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: white !important;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>


    <script>
        $('#calendar').fullCalendar({
            events: [
                    @foreach($communications as $communication)
                {
                    communication_id: '{{ $communication->id }}',
                    url: '/communications/{{  $communication->id }}/edit',
                    title: '{{ $communication->title }}',
                    start: '{{ $communication->start_date }}',
                    description: '{{ $communication->title }}: {{ $communication->description }}',
                    color: '{{ $communication->ask->color_font }}',
                    backgroundColor: '{{ $communication->ask->color_background }}',
                    @if($communication->end_date)
                    end: '{{ $communication->end_date }}',
                    @endif
                },
                @endforeach
            ],
            eventRender: function (event, element) {
                $(element).attr('data-toggle', 'tooltip')
                        .attr('title', event.description)
                        .attr('data-delay', '{ "show": 400, "hide": 10 }');
            },
            header: {
                left: 'prev,next today', // buttons for navigating
                center: 'title', // current view title
                right: 'Filters year,month,week,day' // buttons for switching between views
            },
            customButtons: {
                Filters: {
                    text: '+',
                    click: function () {
                        window.location.replace("/communications/create");
                    }
                }
            },
            views: {
                year: {
                    yearColumns: 3
                },
                week: {
                    type: 'basicWeek'
                },
                day: {
                    type: 'basicDay'
                }
            },
            buttonText: {
                prevYear: "Prev Year",
                nextYear: "Next Year",
                year: 'Year',
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            eventLimit: false,
            firstDay: 1,
            allDayDefault: true,
            contentHeight: "auto",
            editable: true,     
            eventDrop: function(event, delta, revertFunc) {
                //console.log(event.start.format('YYYY-MM-DD'));
                
                $.ajax({
                  type: "POST",
                  url: "{{ env('APP_URL') }}/calendar/update",
                  data: {
                    id: event.communication_id,
                    start_date: event.start.format('YYYY-MM-DD'),
                  },
                });                
            },
            eventResize: function(event, delta, revertFunc) {
                //console.log(event.end.format('YYYY-MM-DD'));

                $.ajax({
                  type: "POST",
                  url: "{{ env('APP_URL') }}/calendar/update",
                  data: {
                    id: event.communication_id,
                    end_date: event.end.format('YYYY-MM-DD'),
                  },
                }); 
            }          
        })
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection