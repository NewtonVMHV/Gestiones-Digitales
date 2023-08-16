@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('profile.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Actualizar perfil </h1>
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
<form action="{{ route('profile.update',Auth::user()->id) }}" method="post">
    @csrf
    @method('put')
    <div class=" row mb-3">
        <div class="col">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre" name="name" value="{{ Auth::user()->name }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="nivel_estudios" class="form-label">Nivel de Estudios</label>
            <select name="nivel_estudios" id="nivel_estudios" class="form-select">
                <option>{{ Auth::user()->nivel_estudios }}</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Preparatoria">Preparatoria</option>
                <option value="Universidad">Universidad</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}">
        </div>
        <div class="col">
            <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="nacimiento" name="fecha_nacimiento" value="{{ Auth::user()->fecha_nacimiento }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="genero" class="form-label">Género:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="genero" value="Masculino" {{ Auth::user()->genero == 'Masculino'?'checked':'' }}>
                <label class="form-check-label" for="genero">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="genero" value="Femenino" {{ Auth::user()->genero == 'Femenino'?'checked':'' }}>
                <label class="form-check-label" for="genero">Femenino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="genero" value="Otro" {{ Auth::user()->genero == 'Otro'?'checked':'' }}>
                <label class="form-check-label" for="genero">Otro</label>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
        <a href="{{ route('profile.index',Auth::user()->id) }}" class="btn btn-dark" >Volver a mi perfil</a>
    </div>
</form>
@endsection