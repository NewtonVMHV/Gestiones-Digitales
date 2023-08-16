@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('imagenes.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar información </h1>
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
<form action="{{route('imagenes.update',$tImagenes)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="Curp">Curp</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" id="Curp" name="Curp" value="{{ $tImagenes->Curp }}" maxlength="18" required/>
                <button class="btn btn-outline-primary" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class='bx bx-search-alt'></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Nombres" class="form-label is-required">Nombres</label>
            <input type="text" class="form-control" id="Nombres" name="Nombres" value="{{ $tImagenes->Nombres }}" readonly required>
        </div>
        <div class="col">
            <label for="Apellidos" class="form-label is-required">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apelldios" value="{{ $tImagenes->Apellidos }}" readonly required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="fotografia">Fotografia de la persona</label>
            <input type="file" class="form-control" id="fotografia" name="fotografia" value="{{ $tImagenes->fotografia }}"/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="inef">INE frente</label>
            <input type="file" class="form-control" id="inef" name="inef" value="{{ $tImagenes->inef }}"/>
        </div>
        <div class="col">
            <label class="form-label" for="inea">INE trasera</label>
            <input type="file" class="form-control" id="inea" name="inea" value="{{ $tImagenes->inea }}"/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="domicilio" class="form-label is-required">Domicilio</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ $tImagenes->domicilio }}" required>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Actualizar información</button>
        <a href="{{ route('imagenes.index') }}" class="btn btn-dark" >Volver al inicio</a>
    </div>
</form>
@endsection