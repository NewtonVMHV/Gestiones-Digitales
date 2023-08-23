@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('gestiones.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar Gestión </h1>
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
<form action="{{ route('gestiones.update',$gestiones) }}" method="post">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col">
            <label for="nombre" class="form-label is-required">Nombre de la gestión</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$gestiones->nombre}}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="estado" class="form-label is-required">Estatus</label>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="estado" value="1" {{$gestiones->estado == '1' ? 'checked':''}} required>
                <label class="form-check-label" for="estado">Activo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="estado" value="0" {{$gestiones->estado == '0' ? 'checked':''}} required>
                <label class="form-check-label" for="inlineRadio2">Inactivo</label>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Actualizar Gestión</button>
        <a href="{{ route('gestiones.index') }}" class="btn btn-dark" >Volver al inicio</a>
    </div>
</form>
@endsection