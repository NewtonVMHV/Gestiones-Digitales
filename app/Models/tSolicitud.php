<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tSolicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_gestion','Nombres','Apellidos','FechaSol','Solicitud','Observaciones','Estatus','address', 'latitude', 'longitude'
    ];
}
