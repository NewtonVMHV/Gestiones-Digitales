@extends('layouts.app')
@section('content')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<style>
    #mapid { height: 300px; }
</style>
<div class="container">
    <br>
    <br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Solicitud de Gestiones</h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('solicitud.home.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="tipo_gestion" class="form-label is-required">Selecciona la gestión</label>
                <select class="form-select" aria-label="Default select example" name="tipo_gestion" required>
                    <option></option>
                    @foreach ($gestiones as $item)
                        <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Nombres" class="form-label is-required">Nombres</label>
                <input type="text" class="form-control" id="Nombres" name="Nombres" required>
            </div>
            <div class="col">
                <label for="Apellidos" class="form-label is-required">Apellidos</label>
                <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="address" class="control-label is-required">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Fecha" class="form-label is-required">Fecha de la solicitud</label>
                <input type="date" class="form-control" id="Fecha" name="FechaSol" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Solicitud" class="form-label is-required">Solicitud</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Solicitud" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="latitude" class="control-label is-required">Latitud</label>
                <input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
            </div>
            <div class="col">
                <label for="longitude" class="control-label is-required">Longitud</label>
                    <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
            </div>
        </div>
        <br>
            <div id="mapid"></div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Observaciones"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Estatus" class="form-label is-required">Estatus</label>
            <div class="col">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="1" checked required>
                    <label class="form-check-label" for="Estatus">Pendiente</label>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script type="text/javascript"> 
    $(document).ready(function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes; //agrega cero si el menor de 10

        document.getElementById('Fecha').value=ano+"-"+mes+"-"+dia;
    });  

    var mapCenter = [{{ request('latitude', 19.344480221864) }}, {{ request('longitude', 269.27608775776) }}];
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