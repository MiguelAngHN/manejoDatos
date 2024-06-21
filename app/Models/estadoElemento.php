<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoElemento extends Model
{
    use HasFactory;

    protected $fillable = ['estado'];

    public function elementos() {
        return $this->hasMany(Elemento::class, 'estado_id');
    }
}
