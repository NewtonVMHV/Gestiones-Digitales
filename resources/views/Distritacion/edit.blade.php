@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('distritacion.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar Distritacion </h1>
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
    <form action="{{route('distritacion.update',$tDistritacion)}}" method="post">
        @csrf
        @method('put')
        <div class="row mb-3">
            <div class="col">
                <label for="Acuerdo" class="form-label is-required">Acuerdo</label>
                <input type="text" class="form-control" id="Acuerdo" name="Acuerdo" value="{{$tDistritacion->Acuerdo}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Fecha" class="form-label is-required">Fecha</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" value="{{$tDistritacion->Fecha}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Observaciones">{{$tDistritacion->Observaciones}}</textarea>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Actualizar Distritacion</button>
            <a href="{{ route('distritacion.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
