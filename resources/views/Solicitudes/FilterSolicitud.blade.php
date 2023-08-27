@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestión de solicitudes</h1>
</div>
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
</div>
@endsection