@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><a href="{{ route('municipio.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Eliminar Municipio </h1>
    </div>
    <form action="{{route('municipio.destroy',$tMunicipios)}}" method="post">
        @csrf
        @method('delete')
        <h3 class="text-center">Usted, ¿Desea eliminar el municipio {{$tMunicipios->Municipio}}?</h3>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-danger">Eliminar Municipio</button>
            <a href="{{ route('municipio.index') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
@endsection
