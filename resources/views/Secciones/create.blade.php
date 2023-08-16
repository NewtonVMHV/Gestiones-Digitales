@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('secciones.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Crear Sección</h1>
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
    <form action="{{route('secciones.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="Secciones" class="form-label is-required">Nombre de la sección</label>
                <input type="text" class="form-control" id="Secciones" name="Secciones" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Diostrito" class="form-label is-required">Selecciona el distrito</label>
                <select class="form-select" aria-label="Selecciona el distrito" name="Distrito">
                    <option></option>
                    @foreach($distritos as $item)
                        <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                    @endforeach
                </select>
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
                <label for="Distritacion" class="form-label is-required">Selecciona la distritacion</label>
                <select class="form-select" aria-label="Selecciona la distritacion" name="Distritacion">
                    <option></option>
                    @foreach($distritacion as $item)
                        <option value="{{$item->Acuerdo}}">{{$item->Acuerdo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Estatus" class="form-label is-required">Estatus</label>
            <div class="col">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="1" checked required>
                    <label class="form-check-label" for="Estatus">Activo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="0" required>
                    <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Agregar Sección</button>
            <a href="{{ route('secciones.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
