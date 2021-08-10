<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operacion;
use DataTables;

class OperacionController extends Controller
{
    public function index()
    {
        return view('admin.operaciones.index');
    }

    public function create()
    {
        return view('admin.operaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required'
        ]);

        Operacion::create($request->all());

        return redirect()->route('admin.operaciones.index')->with('info', 'La operación se creó con éxito');
    }

    public function edit(Operacion $operacione)
    {
        return view('admin.operaciones.edit', compact('operacione'));
    }

    public function update(Request $request, Operacion $operacione)
    {
        $request->validate([
            'tipo' => 'required'
        ]);

        $operacione->update($request->all());

        return redirect()->route('admin.operaciones.index')->with('info', 'La operacion se actualizó con éxito');
    }

    public function destroy(Operacion $operacione)
    {
        $operacione->delete();
        return redirect()->route('admin.operaciones.index')->with('info','La operacion se eliminó con éxito.');
    }

    // Metodo que usaremos en la llamada Ajax desde la vista
    public function getOperaciones(Request $request)
    {
        if ($request->ajax()) {
            $data = Operacion::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Editar</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Borrar</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
