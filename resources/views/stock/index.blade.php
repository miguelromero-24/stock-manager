@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Estado del Stock
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripcion</th>
                        <th>Marca</th>
                        <th>Disponible</th>
                        <th>Licitado</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td>{{ $stock->description }}</td>
                            <td>{{ $stock->brand }}</td>
                            <td>{{ $stock->available_quantity}}</td>
                            <td>{{ $stock->requested_quantity }}</td>
                            <td>{{ $stock->total_quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop