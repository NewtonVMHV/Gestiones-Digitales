@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<style>
    #mapid { height: 400px; }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('solicitud.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles de la solicitud</h1>
</div>
<table class="table table-sm">
    <tbody>
        <tr><td><strong>Curp</strong></td><td>{{ $tSolicitud->Curp }}</td></tr>
        <tr><td><strong>Nombre Completo</strong></td><td>{{ $tSolicitud->Nombres }} {{ $tSolicitud->Apellidos }}</td></tr>
        <tr><td><strong>Fecha de solicitud</strong></td><td>{{ $tSolicitud->FechaSol }}</td></tr>
        <tr><td><strong>Solicitud</strong></td><td>{{ $tSolicitud->Solicitud }}</td></tr>
        <tr><td><strong>Observaciones</strong></td><td>{{ $tSolicitud->Observaciones }}</td></td></tr>
        <tr><td><strong>Dirección</strong></td><td>{{ $tSolicitud->address }}</td></tr>
        <tr><td><strong>Latitud</strong></td><td>{{ $tSolicitud->latitude }}</td></tr>
        <tr><td><strong>Longitud</strong></td><td>{{ $tSolicitud->longitude }}</td></tr>
        <tr><td><strong>Estatus</strong></td><td>
            @if ($tSolicitud->Estatus == '1')
                Pendiente
            @endif
            @if ($tSolicitud->Estatus == '2')
                En trámite
            @endif
            @if ($tSolicitud->Estatus == '3')
                Terminado
            @endif  
        </td></tr>
    </tbody>
</table>
<div class="card-body" id="mapid"></div>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([{{ $tSolicitud->latitude }}, {{ $tSolicitud->longitude }}], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $tSolicitud->latitude }}, {{ $tSolicitud->longitude }}]).addTo(map)
        .bindPopup('{!! $tSolicitud->map_popup_content !!}');
</script>
@endsection