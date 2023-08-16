<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tSecciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'Seccion','Distrito','Municipio','Distritacion','Estatus'
    ];
}
