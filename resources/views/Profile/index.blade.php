@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Mi perfil de usuario</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('profile.edit',Auth::user()->id) }}" class="btn btn-primary"><i class='bx bx-edit'></i></a>
    </div>
  </div>
</div>
<div class="card">
  <h5 class="card-header">
    @if (Auth::user()->hasRole('Admin'))
      <span class="badge rounded-pill bg-dark">Administrador</span>
    @endif
    @if (Auth::user()->hasRole('Capturista')|Auth::user()->hasRole('capturista'))
      <span class="badge rounded-pill bg-dark">Capturista</span>
    @endif
    @if (Auth::user()->hasRole('Analista')|Auth::user()->hasRole('analista'))
      <span class="badge rounded-pill bg-dark">Analista</span>
    @endif
    {{ Auth::user()->name }}
  </h5>
  <div class="card-body">
    <p class="card-text">
      <table class="table table-sm">
        <tbody>
          @if (empty(Auth::user()->name))
            <p></p>
          @else
            <tr><td><strong>Nombre Completo: </strong></td><td>{{ Auth::user()->name }}</td></tr>
          @endif
          @if (empty(Auth::user()->email))
            <p></p>
          @else
            <tr><td><strong>Correo Electrónico: </strong></td><td>{{ Auth::user()->email }}</td></tr>
          @endif
          @if (empty(Auth::user()->fecha_nacimiento))
            <p></p>
          @else
            <tr><td><strong>Fecha de nacimiento: </strong></td><td>{{ Auth::user()->fecha_nacimiento }}</td></tr>
          @endif
          @if (empty(Auth::user()->telefono))
            <p></p>
          @else
            <tr><td><strong>Telefono: </strong></td><td>{{ Auth::user()->telefono }}</td></tr>
          @endif
          @if (empty(Auth::user()->nivel_estudios))
            <p></p>
          @else
            <tr><td><strong>Nivel de estudios: </strong></td><td>{{ Auth::user()->nivel_estudios }}</td></tr>
          @endif
          @if (empty(Auth::user()->genero))
            <p></p>
          @else
            <tr><td><strong>Género: </strong></td><td>{{ Auth::user()->genero }}</td></tr>
          @endif
        </tbody>
      </table>
    </p>
  </div>
</div>
@endsection