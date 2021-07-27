<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diario;

class DiarioController extends Controller
{
    public function index()
    {
        $diarios = Diario::select('diarios.id','diarios.codigoTiempo','diarios.accion','diarios.operacion_id','users.name', 'operaciones.tipo')
                 -> join ('users','users.id', '=','diarios.user_id')
                 -> join ('operaciones','operaciones.id', '=','diarios.operacion_id')
                 ->paginate(10);

        return view('admin.diarios.index', compact('diarios'));
    }

}
