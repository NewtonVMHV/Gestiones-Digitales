<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tImagenes extends Model
{
    use HasFactory;

    protected $fillable = [
        'Curp','Nombres','Apellidos','fotografia','inef','inea','domicilio'
    ];
}
