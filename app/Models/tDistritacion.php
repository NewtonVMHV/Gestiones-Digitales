<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tDistritacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'Acuerdo','Fecha','Observaciones'
    ];
}
