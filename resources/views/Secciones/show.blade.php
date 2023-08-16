@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('secciones.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles de la sección</h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Sección</strong></td><td>{{$tSecciones->Seccion}}</td></tr>
            <tr><td><strong>Distrito</strong></td><td>{{$tSecciones->Distrito}}</td></tr>
            <tr><td><strong>Municipio</strong></td><td>{{$tSecciones->Municipio}}</td></tr>
            <tr><td><strong>Distritación</strong></td><td>{{$tSecciones->Distritacion}}</td></tr>
            <tr><td><strong>Estatus</strong></td><td>
                @if($tSecciones->Estatus == '1')
                    Activo
                @else
                    @if($tSecciones->Estatus == '0')
                        Inactivo
                    @endif
                @endif    
            </td></tr>
        </tbody>
    </table>
@endsection
