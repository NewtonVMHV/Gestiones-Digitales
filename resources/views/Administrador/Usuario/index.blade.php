@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gestión de usuarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('users.create') }}"> Crear Nuevo Usuario <i class='bx bxs-user-plus'></i></a>
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
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Roles</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="width:13%;">
                        <a class="btn btn-info" href="{{ route('users.show',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                        @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('users.edit',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                        @endcan
                        @can('user-delete')
                            <a class="btn btn-danger" href="{{ route('users.eliminar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                        @endcan
                    </td>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->name}}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if(!empty($item->getRoleNames()))
                            @foreach($item->getRoleNames() as $v)
                                <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pagination-sm">
            {{ $data->links() }}
        </div>
    </div>
@endsection
