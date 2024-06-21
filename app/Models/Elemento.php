<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'descripcion', 'serial', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo(estadoElemento::class, 'estado_id');
    }
}
