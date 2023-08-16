@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('diputados.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del diputado</h1>
</div>
<table class="table table-sm">
    <tbody>
        <tr><td><strong>Legislatura</strong></td><td>{{ $tDiputados->Legislatura }}</td></tr>
        <tr><td><strong>Nombre</strong></td><td>{{ $tDiputados->NombreDl }}</td></tr>
        <tr><td><strong>Apellidos</strong></td><td>{{ $tDiputados->ApellidoDl }}</td></tr>
        <tr><td><strong>Distrito</strong></td><td>{{ $tDiputados->Distrito }}</td></tr>
        <tr><td><strong>Estatus</strong></td><td>
            @if ($tDiputados->Estatus == '1')
                Activo
            @else
                @if ($tDiputados->Estatus == '0')
                    Inactivo
                @endif    
            @endif    
        </td></tr>
    </tbody>
</table>
@endsection