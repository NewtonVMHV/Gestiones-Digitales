@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('ciudadanos.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Crear Ciudadano </h1>
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
    <form action="{{route('ciudadanos.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="Curp" class="form-label is-required">Curp</label>
                <input type="text" class="form-control" id="Curp" name="Curp" maxlength="18" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Nombres" class="form-label is-required">Nombre completo</label>
                <input type="text" class="form-control" id="Nombres" name="Nombres" required>
            </div>
            <div class="col">
                <label for="Apellidos" class="form-label is-required">Apellido completo</label>
                <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion">
            </div>
            <div class="col">
                <label for="Colonia" class="form-label is-required">Colonia</label>
                <input type="text" class="form-control" id="Colonia" name="Colonia" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Codigop" class="form-label is-required">Codigo Postal</label>
                <input type="text" class="form-control" id="Codigop" name="Codigop" required>
            </div>
            <div class="col">
                <label for="Seccion" class="form-label is-required">Sección</label>
                <input type="number" class="form-control" id="Seccion" name="Seccion" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Localidad" class="form-label is-required">Selecciona la localidad</label>
                <select class="form-select" aria-label="Selecciona la localidad" name="Localidad" required>
                    <option></option>
                    @foreach($localidad as $item)
                        <option value="{{$item->NombreLoc}}">{{$item->NombreLoc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="Municipio" class="form-label is-required">Selecciona el municipio</label>
                <select class="form-select" aria-label="Selecciona el municipio" name="Municipio" required>
                    <option></option>
                    @foreach($municipio as $item)
                        <option value="{{$item->Municipio}}">{{$item->Municipio}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Distrito" class="form-label is-required">Selecciona el distrito</label>
                <select class="form-select" aria-label="Selecciona el distrito" name="Distrito" required>
                    <option></option>
                    @foreach($distrito as $item)
                        <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="Celular" class="form-label">Número de celular</label>
                <input type="text" class="form-control" id="Celular" name="Celular" maxlength="10">
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Agregar Ciudadano</button>
            <a href="{{ route('ciudadanos.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
