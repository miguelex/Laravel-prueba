<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diario;

use DataTables;

class DiarioController extends Controller
{
    public function index()
    {
        //$diarios = Diario::select('diarios.id','diarios.codigoTiempo','diarios.accion','diarios.operacion_id','users.name', 'operaciones.tipo')
                 //-> join ('users','users.id', '=','diarios.user_id')
                 //-> join ('operaciones','operaciones.id', '=','diarios.operacion_id')
                 //->paginate(10);

        //return view('admin.diarios.index', compact('diarios'));
        return view('admin.diarios.index');
    }

    public function getDiarios(Request $request)
    {
        if ($request->ajax()) {
            $data = Diario::select('diarios.id','diarios.codigoTiempo','diarios.accion',
                                   'diarios.operacion_id as tipo','users.name as usuario')
                                    -> join ('users','users.id', '=','diarios.user_id')
                                    -> join ('operaciones','operaciones.id', '=','diarios.operacion_id')
                                    ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
