@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('distrito.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Crear Distrito </h1>
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
    <form action="{{route('distrito.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="NombreDl" class="form-label is-required">Nombre del distrito</label>
                <input type="text" class="form-control" id="NombreDl" name="NombreDl" required>
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
            <button type="submit" class="btn btn-primary">Agregar Distrito</button>
            <a href="{{ route('distrito.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
