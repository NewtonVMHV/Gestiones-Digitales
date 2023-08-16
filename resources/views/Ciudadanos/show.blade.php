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
            <tr><td><strong>Dirección</strong></td><td>{{$tCiudadnos->Direccion}}</td></tr>
            <tr><td><strong>Colonia</strong></td><td>{{$tCiudadnos->Colonia}}</td></tr>
            <tr><td><strong>Codigo Postal</strong></td><td>{{$tCiudadnos->Codigop}}</td></tr>
            <tr><td><strong>Celular</strong></td><td>{{$tCiudadnos->Celular}}</td></tr>
            <tr><td><strong>Sección</strong></td><td>{{$tCiudadnos->Seccion}}</td></tr>
            <tr><td><strong>Localidad</strong></td><td>{{$tCiudadnos->Localidad}}</td></tr>
            <tr><td><strong>Municipio</strong></td><td>{{$tCiudadnos->Municipio}}</td></tr>
            <tr><td><strong>Distrito</strong></td><td>{{$tCiudadnos->Distrito}}</td></tr>
        </tbody>
    </table>
@endsection
