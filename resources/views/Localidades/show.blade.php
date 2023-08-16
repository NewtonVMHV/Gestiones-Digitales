@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('localidades.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles de la localidad </h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Localidad</strong></td><td>{{$tLocalidades->NombreLoc}}</td></tr>
            <tr><td><strong>Municipio</strong></td><td>{{$tLocalidades->Municipio}}</td></tr>
            <tr><td><strong>Observaciones</strong></td><td>{{$tLocalidades->Observaciones}}</td></tr>
        </tbody>
    </table>
@endsection
