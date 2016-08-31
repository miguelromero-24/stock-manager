@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Listado de Licitaciones
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descipcion</th>
                        <th>Entidad</th>
                        <th>Contrato</th>
                        <th>Tipo</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tenders as $tender)
                        <tr>
                            <td>{{ $tender->id }}</td>
                            <td>{{ $tender->description }}</td>
                            <td>{{ $tender->clientes}}</td>
                            <td>{{ $tender->contract_number }}</td>
                            <td>@if($tender->tender_type == 1) Bienes @else Servicios @endif</td>
                            <td>{{ $tender->date_start }}</td>
                            <td>{{ $tender->date_end }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ url("tender/edit/{$tender->id}") }}" title="Editar"><i class="icon_pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ url("tender/destroy/{$tender->id}") }}" title="Eliminar"><i class="icon_minus-06"></i></a>
                                    <a class="btn btn-default" href="{{ url("tender/details/{$tender->id}") }}" title="Detalles"><i class="icon_plus"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @stop