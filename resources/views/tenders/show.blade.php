@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Licitacion
                </header>
                <div class="panel-body">

                </div>
            </section>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('dash/js/moment.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dash/js/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dash/js/datetime.min.js')}}"></script>
    <script>
        $(function() {
            $('#date_start').datetimepicker({
                locale: 'es',
                format: 'YYYY-MM-DD'
            });
            $('#date_end').datetimepicker({
                locale: 'es',
                format: 'YYYY-MM-DD'
            });

        });

    </script>
    <script type="text/javascript" src="{{ asset('dash/js/selectize/selectize.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dash/js/selectize/selectize.min.js')}}"></script>
    <script>
        console.log("Selectize");
        $('#select_clients').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            render: {
                item: function(item, escape){
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $clientsJson !!}
        });
    </script>
@stop