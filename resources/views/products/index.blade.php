@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Listado de Productos
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripcion</th>
                        <th>Codigo</th>
                        <th>U. Medida</th>
                        <th>Precio</th>
                        <th>Marca</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->unit_measure}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->brand }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop