@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('localidades.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Crear Localidad </h1>
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
    <form action="{{route('localidades.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="NombreLoc" class="form-label is-required">Nombre de la localidad</label>
                <input type="text" class="form-control" id="NombreLoc" name="NombreLoc" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Municipio" class="form-label is-required">Selecciona el municipio</label>
                <select class="form-select" aria-label="Selecciona el municipio" name="Municipio">
                    <option></option>
                    @foreach($municipios as $item)
                        <option value="{{$item->Municipio}}">{{$item->Municipio}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Observaciones"></textarea>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Agregar Localidad</button>
            <a href="{{ route('localidades.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
