<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    use HasFactory;

    public function users ()
    {
        return $this->belongsTo(users::class);
    }

    public function operaciones ()
    {
        return $this->belongsTo(Operacion::class);
    }
}
