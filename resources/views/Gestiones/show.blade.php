@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('gestiones.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles de la gestiones </h1>
</div>
<table class="table table-sm">
    <tbody>
        <tr><td><strong>Nombre de la gestión</strong></td><td>{{$gestiones->nombre}}</td></tr>
        <tr><td><strong>Estatus</strong></td><td>
            @if($gestiones->estado == '1')
                Activo
            @else
                @if($gestiones->estado == '0')
                    Inactivo
                @endif
            @endif    
        </td></tr>
    </tbody>
</table>
@endsection