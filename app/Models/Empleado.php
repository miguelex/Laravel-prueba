<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function ciudades ()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function situaciones ()
    {
        return $this->belongsTo(Situacion::class);
    }

    public function jornadas ()
    {
        return $this->hasMany(Jornada::class);
    }

    public function caras ()
    {
        return $this->hasOne(Cara::class);
    }
}
