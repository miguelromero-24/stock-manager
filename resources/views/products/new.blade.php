@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Producto
                </header>
                <div class="panel-body">
                    {{ Form::open(array('url' => url('products/save'), 'method' => 'post', 'id' => 'tenderNew', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('description', 'Nombre: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('code', 'Codigo: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('code', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('origin', 'Origen: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('origin', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('unit_measure', 'Unidad de Medida: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('unit_measure', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Precio: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('price', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('brand', 'Marca: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('brand', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('telephone', 'Telefono: ', array('class' => 'col-sm-2 control-label')) }}--}}
                        {{--<div class="col-sm-4">--}}
                            {{--{{ Form::text('telephone', null, array('class' => 'form-control')) }}--}}
                        {{--</div>--}}
                        {{--{{ Form::label('status', 'Estado', array('class' => 'control-label col-lg-2')) }}--}}
                        {{--<div class="col-sm-4">--}}
                            {{--{{ Form::select('status', array('0' => 'Habilitado', '1' => 'Deshabilitado'), null, array('class' => 'form-control m-bot15')) }}--}}
                        {{--</div>--}}

                    {{--</div>--}}

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

@stop