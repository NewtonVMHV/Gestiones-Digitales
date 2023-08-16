@extends('layouts.sliderbar')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="{{ route('imagenes.index') }}"><i class='bx bx-chevron-left-circle'></i></a> Enviar información</h1>
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
<form action="{{ route('imagenes.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="Curp">Curp</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="Curp" name="Curp" maxlength="18" required/>
                <button class="btn btn-outline-primary" type="button" id="button-addon1" data-mdb-ripple-color="dark"  onclick="buscar_datos();">
                    <i class='bx bx-search-alt'></i>
                </button>
            </div>
            <div class="alert alert-success" role="alert" id="ciudadano">
                ¡Ciudadano encontrado!
            </div>
            <div class="alert alert-danger" role="alert" id="no-ciudadano">
                ¡Ciudadano encontrado!
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Nombres" class="form-label is-required">Nombres</label>
            <input type="text" class="form-control" id="Nombres" name="Nombres" readonly required>
        </div>
        <div class="col">
            <label for="Apellidos" class="form-label is-required">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" readonly required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="domicilio" class="form-label is-required">Domicilio</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="fotografia">Fotografia de la persona</label>
            <input type="file" class="form-control" id="fotografia" name="fotografia" accept="image/*" required/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="inef">INE frente</label>
            <input type="file" class="form-control" id="inef" name="inef" accept="image/*" required/>
        </div>
        <div class="col">
            <label class="form-label" for="inea">INE trasera</label>
            <input type="file" class="form-control" id="inea" name="inea" accept="image/*" required/>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Enviar información</button>
        <a href="{{ route('imagenes.index') }}" class="btn btn-dark" >Volver al inicio</a>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#ciudadano').hide();
        $('#no-ciudadano').hide();
    });  
    function buscar_datos(){
        Curp = $("#Curp").val();
        var parametros ={
            "buscar": 1,
            "curp" : Curp
        }
        $.ajax({
            data:  parametros,
            dataType: 'json',
            url:   '/Imagenes/Autocomplete',
            type:  'get',
        success:  function (valores) {
            if(valores.existe=="1") {
                $("#ciudadano").show();
                $("#Nombres").val(valores.Nombres);
                $("#Apellidos").val(valores.Apellidos);
                $("#domicilio").val(valores.Domicilio);
            }else{
                $("#no-ciudadano").show();
            }
        }
    }) 
}
</script>
@endsection