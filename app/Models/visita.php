<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visita extends Model
{
    //no tenemos ~table->timestamps() asi que desactivamos el llenado
    public $timestamps = false; 

    protected $fillable = [
        'titulo',
        'descripcion',
        'activo',
    ];


public function recorridos()
{
    return $this->hasMany(Recorrido::class, 'visita_id');
}
}
