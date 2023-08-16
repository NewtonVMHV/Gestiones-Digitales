@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gestión de Roles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @can('role-create')
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('roles.create') }}"> Crear Nuevo Role <i class='bx bxs-user-plus'></i></a>
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
        <table id="tabla" class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $item)
                <tr>
                    <td style="width:13%;">
                        <a class="btn btn-info" href="{{ route('roles.show',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                        @endcan
                        @can('role-delete')
                            <a class="btn btn-danger" href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                        @endcan
                    </td>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pagination-sm">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
