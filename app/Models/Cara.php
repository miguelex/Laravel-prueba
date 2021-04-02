<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cara extends Model
{
    use HasFactory;

    // Método para recuperar al emmpleado propietario de la cara

    public function empleados ()
    {
        return $this->belongsTo(Empleado::class);
    }
}
