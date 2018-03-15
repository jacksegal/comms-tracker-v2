@extends('layouts.model')

@section('model-content')

    <table id="{{ $model }}_table" class="table" cellspacing="0" width="100%">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{ $column['header'] }}</th>
            @endforeach
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($rows as $row)
            <tr>
                @foreach($columns as $column)

                    @if(isset($column['nested']))
                        <td>{{ $row->{$column['row1']} ? $row->{$column['row1']}->{$column['row2']} : '' }}</td>
                    @else
                        <td>{{ $row->{$column['row']} }}</td>
                    @endif

                @endforeach
                <td>
                    <a href="/{{ $model }}s/{{$row->id}}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="/{{ $model }}s/{{$row->id}}/edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a href="/{{ $model }}s/{{$row->id}}/clone">
                        <i class="fa fa-files-o" aria-hidden="true"></i>
                    </a>
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <a href="/{{ $model }}s/create" class="btn btn-primary" role="button">Create New {{ $label }}</a>

    <style>
        .dt-buttons {
            margin-left: 50px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('{{ '#' . $model . '_table' }}').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection