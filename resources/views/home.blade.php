@extends('layouts.sliderbar')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>SECCIONES</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $secciones }}</h5>
                <p class="card-text">Es la cantidad que refleja las divisiones geograficas que utlizan para organizar las elecciones en México.</p>
            </div>
        </div>
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>CIUDADANOS</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $ciudadanos }}</h5>
                <p class="card-text">Es la cantidad de personas registradas en los comités y en el sistema.</p>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>DIPUTADOS</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $diputados }}</h5>
                <p class="card-text">Es la cantidad de diputados registrados en el sistema que representan en el estado de Campeche.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>LOCALIDADES</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $localidades }}</h5>
                <p class="card-text">Es la cantidad de localidades registrados que se encuentra en el estado de Campeche.</p>
            </div>
        </div>
        <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>MUNICIPIOS</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $municipios }}</h5>
                <p class="card-text">Es la cantidad de municipios que se encuentran registradas en el estado de Campeche.</p>
            </div>
        </div>
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>SOLICITUDES</strong></div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $solicitud }}</h5>
                <p class="card-text">Es la cantidad de solicitudes que están solicitando los ciudadanos.</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Sección de ciudadanos</h2>
    </div>
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Curp</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Apellido Completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Colonia</th>
                <th scope="col">Sección</th>
                <th scope="col">Localidad</th>
                <th scope="col">Municipio</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tCiudadanos as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->Curp}}</td>
                    <td>{{$item->Nombres}}</td>
                    <td>{{$item->Apellidos}}</td>
                    <td>{{$item->Direccion}}</td>
                    <td>{{$item->Colonia}}</td>
                    <td>{{$item->Seccion}}</td>
                    <td>{{$item->Localidad}}</td>
                    <td>{{$item->Municipio}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pagination-sm">
            {{ $tCiudadanos->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
@endsection
