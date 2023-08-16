@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('ciudadanos.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Eliminar ciudadano</h1>
    </div>
    <form action="{{route('ciudadanos.destroy',$tCiudadnos)}}" method="post">
        @csrf
        @method('delete')
        <h3 class="text-center">Usted, ¿Desea eliminar el Ciudadano {{$tCiudadnos->Nombres}} {{$tCiudadnos->Apellidos}}?</h3>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-danger">Eliminar Ciudadano</button>
            <a href="{{ route('ciudadanos.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
