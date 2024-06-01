<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;
    // Definir la tabla asociada (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'votos';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'voto',
        'status',
        'process',
        'statusjr',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
