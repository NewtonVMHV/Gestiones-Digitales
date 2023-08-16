@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('roles.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del role </h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Nombre</strong></td><td>{{ $role->name }}</td></tr>
            <tr><td><strong>Permisos</strong></td><td>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif    
            </td></tr>
        </tbody>
    </table>
@endsection
