@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('users.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del usuario </h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Nombre</strong></td><td>{{ $user->name }}</td></tr>
            <tr><td><strong>Correo Electronico</strong></td><td>{{ $user->email }}</td></tr>
            <tr><td><strong>Roles:</strong></td><td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                    @endforeach
                @endif    
            </td></tr>
        </tbody>
    </table>
@endsection
