<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpatizante extends Model
{
    use HasFactory;

    protected $table = 'simpatizante';

    protected $fillable = [
        'fecha_nacimiento',
        'sexo',
        'fecha_alta',
        'ocupacion',
        'tel_celular',
        'tel_particular',
        'email',
        'facebook',
        'twitter',
        'informacion',
        'calle',
        'municipio',
        'seccion',
        'num',
        'int',
        'codigo_postal',
        'colonia',
        'clave',
        'status',
        'process',
    ];

}
