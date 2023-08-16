<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tCiudadanos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Curp','Nombres','Apellidos','Direccion','Colonia','Codigop','Seccion','Localidad','Municipio','Distrito','Celular'
    ];
}
