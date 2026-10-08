<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recorrido extends Model
{
    protected $table = 'recorridos';
    public $timestamps = false; 

    protected $fillable = [
        'visita_id',
        'titulo',
        'descripcion',
        'activo',
    ];

    // Relación inversa: Un recorrido pertenece a una visita
    public function visita()
    {
        return $this->belongsTo(Visita::class, 'visita_id');
    }
}
