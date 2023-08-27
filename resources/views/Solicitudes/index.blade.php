@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestión de solicitudes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('solicitud.create') }}"> Crear solicitud <i class='bx bxs-user-plus'></i></a>&nbsp;
            <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#FilterSolicitud"><i class='bx bx-filter' ></i></a>
            <!-- Modal -->
            <div class="modal fade" id="FilterSolicitud" tabindex="-1" aria-labelledby="FilterSolicitud" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtrado avanzado de solicitudes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('solicitud.filter') }}">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Fecha" class="form-label is-required">Fecha de la solicitud</label>
                                    <input type="date" class="form-control" id="Fecha" name="Fecha">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Estatus" class="form-label is-required">Estatus</label>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="1" checked>
                                        <label class="form-check-label" for="Estatus">Pendiente</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="2">
                                        <label class="form-check-label" for="Estatus">En trámite</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="3">
                                        <label class="form-check-label" for="Estatus">Terminado</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Filtrar Solicitudes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Fecha de solicitud</th>
                <th scope="col">Estatus</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tSolicitud as $item)
            <tr>
                <td style="width:13%;">
                    <a class="btn btn-info" href="{{route('solicitud.show',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                    @can('solicitud-edit')
                        <a class="btn btn-primary" href="{{route('solicitud.edit',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                    @endcan
                    @can('solicitud-delete')
                        <a class="btn btn-danger" href="{{route('solicitud.eliminar',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                            <i class='bx bxs-trash-alt' ></i>
                        </a>
                    @endcan
                    <a class="btn btn-warning" href="{{route('solicitud.export',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Exportar"><i class='bx bx-export'></i></a>
                </td>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->Nombres }}</td>
                <td>{{ $item->Apellidos }}</td>
                <td>{{$item->FechaSol}}</td>
                <td>
                    @if ($item->Estatus == '1')
                        Pendiente
                    @endif
                    @if ($item->Estatus == '2')
                          En trámite  
                    @endif
                    @if ($item->Estatus == '3')
                        Terminado
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination pagination-sm">
        {{ $tSolicitud->links() }}
    </div>
</div>
@endsection