<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    // Método que recupera el lsitado de ciudades que conforman la provincia
    public function ciudades ()
    {
        return $this->hasMany(Ciudad::class);
    }
}
