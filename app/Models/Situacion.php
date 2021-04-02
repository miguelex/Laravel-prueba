<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacion extends Model
{
    use HasFactory;

    // Método que recupera la situación del empelado

    public function empleados ()
    {
        return $this->hasMany(Empleado::class);
    }
}
