@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
crossorigin=""/>
<style>
    #mapid { height: 300px; }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('solicitud.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar Solicitud</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('solicitud.update',$tSolicitud) }}" method="post">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="Curp">Curp</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="Curp" name="Curp" onblur="buscar_datos();" value="{{ $tSolicitud->Curp }}" required/>
                <button class="btn btn-outline-primary" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class='bx bx-search-alt'></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Nombres" class="form-label is-required">Nombres</label>
            <input type="text" class="form-control" id="Nombres" name="Nombres" value="{{ $tSolicitud->Nombres }}" required>
        </div>
        <div class="col">
            <label for="Apellidos" class="form-label is-required">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{ $tSolicitud->Apellidos }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="address" class="control-label is-required">Dirección</label>
            <textarea id="address" class="form-control" name="address" rows="4">{{ $tSolicitud->address }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Fecha" class="form-label is-required">Fecha de la solicitud</label>
            <input type="date" class="form-control" id="Fecha" name="FechaSol" value="{{ $tSolicitud->FechaSol }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Solicitud" class="form-label is-required">Solicitud</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Solicitud" required>{{ $tSolicitud->Solicitud }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="latitude" class="control-label is-required">Latitud</label>
            <input id="latitude" type="text" class="form-control" name="latitude" value="{{$tSolicitud->latitude}}" readonly required>
        </div>
        <div class="col">
            <label for="longitude" class="control-label is-required">Longitud</label>
                <input id="longitude" type="text" class="form-control" name="longitude" value="{{ $tSolicitud->longitude }}" readonly required>
        </div>
    </div>
    <br>
        <div id="mapid"></div>
    <br>
    <div class="row mb-3">
        <div class="col">
            <label for="Observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Observaciones">{{ $tSolicitud->Observaciones }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="Estatus" class="form-label is-required">Estatus</label>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="1" {{ $tSolicitud->Estatus == '1' ? 'checked':'' }} required>
                <label class="form-check-label" for="Estatus">Pendiente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="2"  {{ $tSolicitud->Estatus == '2' ? 'checked':'' }} required>
                <label class="form-check-label" for="Estatus">En trámite</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="3"  {{ $tSolicitud->Estatus == '3' ? 'checked':'' }} required>
                <label class="form-check-label" for="Estatus">Terminado</label>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Editar Solicitud</button>
        <a href="{{ route('solicitud.index') }}" class="btn btn-dark" >Volver al inicio</a>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', $tSolicitud->latitude) }}, {{ request('longitude', $tSolicitud->longitude) }}];
    var map = L.map('mapid').setView(mapCenter, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
@endsection