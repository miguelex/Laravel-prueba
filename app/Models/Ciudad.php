<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    // Método que recuperar la provincia a la que pertenece la ciudad
    public function provincias ()
    {
        return $this->belongsTo(Provincia::class);
    }

    // Método que recuepera a los empleados que viven en la ciudad
    public function empleados ()
    {
        return $this->hasMany(Empleado::class);
    }
}
