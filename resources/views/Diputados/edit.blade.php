@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('diputados.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar Diputado </h1>
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
<form action="{{ route('diputados.update',$tDiputados) }}" method="post">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col">
            <label for="Legislatura" class="form-label is-required">Legislatura</label>
            <input type="text" class="form-control" id="Legislatura" name="Legislatura" value="{{ $tDiputados->Legislatura }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="NombreDL" class="form-label is-required">Nombre completo</label>
            <input type="text" class="form-control" id="NombreDL" name="NombreDl" value="{{ $tDiputados->NombreDl }}" required>
        </div>
        <div class="col">
            <label for="ApellidoDL" class="form-label is-required">Apellido completo</label>
            <input type="text" class="form-control" id="ApellidoDL" name="ApellidoDl" value="{{ $tDiputados->ApellidoDl }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Distrito" class="form-label is-required">Selecciona el distrito</label>
            <select class="form-select" aria-label="Selecciona el distrito" name="Distrito">
                <option>{{ $tDiputados->Distrito }}</option>
                @foreach($distritos as $item)
                    <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="Estatus" class="form-label is-required">Estatus</label>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="1" {{ $tDiputados->Estatus == '1'? 'checked':'' }} required>
                <label class="form-check-label" for="Estatus">Activo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Estatus" id="Estatus" value="0" {{ $tDiputados->Estatus == '0' ? 'checked':'' }} required>
                <label class="form-check-label" for="inlineRadio2">Inactivo</label>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Actualizar Diputado</button>
        <a href="{{ route('diputados.index') }}" class="btn btn-dark" >Volver al inicio</a>
    </div>
</form>
@endsection