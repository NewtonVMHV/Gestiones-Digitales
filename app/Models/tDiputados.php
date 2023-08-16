<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tDiputados extends Model
{
    use HasFactory;

    protected $fillable = [
        'Legislatura','NombreDl','ApellidoDl','Distrito','Estatus'
    ];
}
