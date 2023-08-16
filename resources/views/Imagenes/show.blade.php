@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('imagenes.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar información </h1>
</div>
<table class="table table-sm">
    <tbody>
        <tr><td><strong>Curp</strong></td><td>{{ $tImagenes->Curp }}</td></tr>
        <tr><td><strong>Nombres</strong></td><td>{{ $tImagenes->Nombres }}</td></tr>
        <tr><td><strong>Apellidos</strong></td><td>{{ $tImagenes->Apellidos }}</td></tr>
        <tr><td><strong>Fotografia</strong></td><td><img src="{{ URL::asset('ciudadanos/'.$tImagenes->fotografia) }}" alt="" width="100" height="100"></td></tr>
        <tr><td><strong>INE frente</strong></td><td><img src="{{ URL::asset('credencial/'.$tImagenes->inef)}}" alt="" alt="" width="100" height="100"></td></tr>
        <tr><td><strong>INE trasera</strong></td><td><img src="{{ URL::asset('credencial/'.$tImagenes->inea)}}" alt="" alt="" width="100" height="100"></td></tr>
    </tbody>
</table>
@endsection