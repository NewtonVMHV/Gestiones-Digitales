@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tipos de Gestiones</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @can('distritos-create')
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('gestiones.create') }}"> Crear Gestión <i class='bx bxs-user-plus'></i></a>
                @endcan
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
                <th scope="col">Nombre del tipo de gestión</th>
                <th scope="col">Estatus</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($gestiones as $item)
                <tr>
                    <td style="width:13%;">
                        <a class="btn btn-info" href="{{route('gestiones.show',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                        @can('distritos-edit')
                            <a class="btn btn-primary" href="{{route('gestiones.edit',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                        @endcan
                        @can('distritos-delete')
                            <a class="btn btn-danger" href="{{route('gestiones.eliminar',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                        @endcan
                    </td>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->nombre}}</td>
                    <td>
                        @if($item->estado == '1')
                            Activo
                        @else
                            @if($item->estado == '0')
                                Inactivo
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pagination-sm">
            {{ $gestiones->links() }}
        </div>
    </div>
@endsection