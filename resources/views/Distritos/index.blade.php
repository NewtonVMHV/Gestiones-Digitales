@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gestión de distritos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @can('distritos-create')
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('distrito.create') }}"> Crear Distrito <i class='bx bxs-user-plus'></i></a>
                @endcan
            </div>
        </div>
    </div>
    <form role="search">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese el nombre del distrito" aria-label="Example text with button addon" aria-describedby="button-addon1" id="searchDistrito" name="SearchDistrito"/>
            <button type="submit" class="btn btn-outline-primary" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                <i class='bx bx-search-alt'></i>
            </button>
        </div>
    </form>
    <hr>
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
                <th scope="col">Nombre del Distrito</th>
                <th scope="col">Estatus</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tDistritos as $item)
                <tr>
                    <td style="width:13%;">
                        <a class="btn btn-info" href="{{route('distrito.show',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                        @can('distritos-edit')
                            <a class="btn btn-primary" href="{{route('distrito.edit',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                        @endcan
                        @can('distritos-delete')
                            <a class="btn btn-danger" href="{{route('distrito.eliminar',$item->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                        @endcan
                    </td>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->Nombre}}</td>
                    <td>
                        @if($item->Estatus == '1')
                            Activo
                        @else
                            @if($item->Estatus == '0')
                                Inactivo
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pagination-sm">
            {{ $tDistritos->links() }}
        </div>
    </div>
@endsection
