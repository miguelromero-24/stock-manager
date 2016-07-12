@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Cliente
                </header>
                <div class="panel-body">
                    {{ Form::open(array('url' => url('clients/save'), 'method' => 'post', 'id' => 'tenderNew', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('description', 'Nombre: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('address', 'Direccion: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('address', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('contact', 'Contacto: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('contact', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('email', 'Correo Electronico: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('email', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('invoice_name', 'Nombre para Facturar: ', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                            {{ Form::text('invoice_name', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('tax_code', 'RUC: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('tax_code', null, array('class' => 'form-control')) }}
                        </div>

                    </div>
                    <div class="form-group">
                        {{ Form::label('telephone', 'Telefono: ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            {{ Form::text('telephone', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::label('status', 'Estado', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-sm-4">
                        {{ Form::select('status', array('0' => 'Habilitado', '1' => 'Deshabilitado'), null, array('class' => 'form-control m-bot15')) }}
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

@stop