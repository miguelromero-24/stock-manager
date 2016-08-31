@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nueva Adjudicacion
                </header>
                <div class="panel-body">
                    {{ Form::open(array('url' => url('tender/save'), 'method' => 'post', 'id' => 'tenderNew', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('description', 'Titulo: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('contract_number', 'Contrato: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('contract_number', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('client_id', 'Cliente: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('client_id', !empty($client_id) ? $client_id : null, array('class' => 'form-control', 'id' => 'select_clients')) }}

                        </div>
                        {{ Form::label('tender_type', 'Tipo de contrato', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            <select id="tender_type" class="form-control m-bot15">
                                <option id="0">Bienes</option>
                                <option id="1">Servicios</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('date_start', 'Fecha Inicio: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('date_start', null, array('class' => 'form-control', 'id' => 'date_start', 'name' => 'date_start')) }}
                        </div>
                        {{ Form::label('date_end', 'Fecha Fin: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('date_end', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('awarded_amount', 'Monto Adjudicado: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('awarded_amount', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {{ Form::close() }}
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
        $(function () {
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
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $clientsJson !!}
        });
    </script>
@stop