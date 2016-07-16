@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nueva Compra
                </header>
                <div class="panel-body">
                    {{ Form::open(array('url' => url('purchases/save'), 'method' => 'post', 'id' => 'tenderNew', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('provider', 'Proveedor: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('provider', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('invoice_number', 'Factura Nro: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('invoice_number', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('products', 'Productos: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('products', !empty($client_id) ? $client_id : null, array('class' => 'form-control', 'id' => 'select_clients')) }}

                        </div>
                        <div class="form-group">
                            {{ Form::label('quantity', 'Cantidad: ', array('class' => 'col-sm-2 control-label')) }}
                            <div class="col-sm-4">
                                {{ Form::text('quantity', null, array('class' => 'form-control')) }}
                            </div>
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
    {{--<script>--}}
        {{--console.log("Selectize");--}}
        {{--$('#select_clients').selectize({--}}
            {{--delimiter: ',',--}}
            {{--persist: false,--}}
            {{--openOnFocus: true,--}}
            {{--valueField: 'id',--}}
            {{--labelField: 'description',--}}
            {{--searchField: 'description',--}}
            {{--render: {--}}
                {{--item: function(item, escape){--}}
                    {{--return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';--}}
                {{--}--}}
            {{--},--}}
            {{--options: {!! $productJson !!}--}}
        {{--});--}}
    {{--</script>--}}
@stop