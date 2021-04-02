<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    // Metodo que recupera a los empelados que han realziado una operacion
    public function empleados ()
    {
        return $this->hasMany(Diario::class);
    }
}
