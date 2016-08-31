@extends('template')
@section('main')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Items a adjudicar - Licitacion: {{ $tender->description }}
                </header>
                <div class="panel-body">
                    {{ Form::open(array('url' => url('tender/details/'), 'method' => 'post', 'id' => 'tenderNew', 'class' => 'form-horizontal')) }}
                    {{ Form::label('items[][product_id][]', 'Producto: ', array('class' => 'col-lg-3')) }}
                    {{ Form::label('items[][measurement][]', 'Medida: ', array('class' => 'col-lg-2')) }}
                    {{ Form::label('items[][quantity][]', 'Cantidad: ', array('class' => 'col-lg-3')) }}
                    {{ Form::label('items[][amount][]', 'Monto: ', array('class' => 'col-lg-3 ')) }}

                    <div id="t">
                        <div class="row" id="items">
                            <div class="col-lg-3">
                                {{ Form::select('items[][product_id][]', $products, null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-lg-2">
                                {{ Form::select('items[][measurement][]', $measurement, null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-lg-3">
                                {{ Form::text('items[][quantity][]', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-lg-3">
                                {{ Form::text('items[][amount][]', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-lg-1">
                                <a class="btn btn-success" href="#" title="Agregar" id="more_items"
                                   onclick="addInput()"><i class="icon_plus"></i></a>
                                <a class="btn btn-warning" href="#" title="Borrar" id="minus_items"><i
                                            class="icon_minus-06"></i></a>
                            </div>
                        </div>
                        <br>
                    </div>

                    <br>
                    <input type="hidden" id="tender_id" name="tender_id" value="{{ $tender->id }}">
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

    <script type="text/javascript" src="{{ asset('dash/js/selectize/selectize.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dash/js/selectize/selectize.min.js')}}"></script>

    <script>
        function addInput() {
            var newDiv = document.getElementById('items');
            document.getElementById('t').appendChild(newDiv.cloneNode(true));
        }
        function deleteInput() {
            var newDiv = document.getElementById('items');
            document.getElementById('items').remove();
        }

    </script>
@stop