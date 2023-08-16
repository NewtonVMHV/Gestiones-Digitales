@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('users.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Crear Nuevo Usuario </h1>
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
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="name" class="form-label is-required">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label is-required">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="password" class="form-label is-required">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col">
                <label for="confirm-password" class="form-label is-required">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            </div>
        </div>
        <div class=" row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona el Role</label>
                <select name="roles" class="form-select" aria-label="Default select example" required>
                    <option></option>
                    @foreach ($roles as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            <a href="{{ route('users.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
