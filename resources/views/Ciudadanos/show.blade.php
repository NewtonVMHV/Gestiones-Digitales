@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('ciudadanos.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del ciudadano</h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Curp</strong></td><td>{{$tCiudadnos->Curp}}</td></tr>
            <tr><td><strong>Nombre</strong></td><td>{{$tCiudadnos->Nombres}}</td></tr>
            <tr><td><strong>Apellidos</strong></td><td>{{$tCiudadnos->Apellidos}}</td></tr>
            <tr><td><strong>Fotografia</strong></td><td><img src="{{ URL::asset('ciudadanos/'.$tCiudadnos->fotografia) }}" alt="" width="100" height="100"></td></tr>
            <tr><td><strong>INE frente</strong></td><td><img src="{{ URL::asset('credencial/'.$tCiudadnos->inef)}}" alt="" alt="" width="100" height="100"></td></tr>
            <tr><td><strong>INE trasera</strong></td><td><img src="{{ URL::asset('credencial/'.$tCiudadnos->inea)}}" alt="" alt="" width="100" height="100"></td></tr>
            <tr><td><strong>Dirección</strong></td><td>{{$tCiudadnos->Direccion}}</td></tr>
            <tr><td><strong>Colonia o Comunidad</strong></td><td>{{$tCiudadnos->Colonia}}</td></tr>
            <tr><td><strong>Celular</strong></td><td>{{$tCiudadnos->Celular}}</td></tr>
            <tr><td><strong>Sección</strong></td><td>{{$tCiudadnos->Seccion}}</td></tr>
            <tr><td><strong>Municipio</strong></td><td>{{$tCiudadnos->Municipio}}</td></tr>
        </tbody>
    </table>
@endsection
