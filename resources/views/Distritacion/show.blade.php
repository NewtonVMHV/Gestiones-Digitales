@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('distritacion.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles de la distritacion </h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Acuerdo</strong></td><td>{{$tDistritacion->Acuerdo}}</td></tr>
            <tr><td><strong>Fecha</strong></td><td>{{$tDistritacion->Fecha}}</td></tr>
            <tr><td><strong>Observaciones</strong></td><td>{{$tDistritacion->Observaciones}}</td></tr>
        </tbody>
    </table>
@endsection
