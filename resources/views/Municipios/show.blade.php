@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('municipio.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del municipio </h1>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Municipio</strong></td><td>{{$tMunicipios->Municipio}}</td></tr>
            <tr><td><strong>Observaciones</strong></td><td>{{$tMunicipios->Observaciones}}</td></tr>
        </tbody>
    </table>
@endsection
