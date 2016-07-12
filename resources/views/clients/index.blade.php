@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Listado de Clientes
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->description }}</td>
                        <td>{{ $client->contact }}</td>
                        <td>{{ $client->telephone  }}</td>
                        <td>{{ $client->email }}</td>
                        <td>@if ($client->status == true) Habilitado @else Deshabilitado @endif</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop