<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_detail';
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
        'coordinador_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coordinador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'coordinador_id');
    }
}
