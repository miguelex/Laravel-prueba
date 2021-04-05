<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operacion;

class OperacionController extends Controller
{
    public function index()
    {
        $operaciones = Operacion::all();
        return view('admin.operaciones.index', compact('operaciones'));
    }

    public function create()
    {
        return view('admin.operaciones.create');
    }

    public function store(Request $request)
    {
        $nuevaOperacion = new Operacion;
        $nuevaOperacion->tipo = $request->input('tipo');
        $nuevaOperacion->save();
        return redirect()->route('admin.operaciones.index')->with('op.info','Operación añadida.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $operacion = Operacion::findOrFail($id);
        return view('admin.operaciones.edit',compact('operacion'));
    }

    public function update(Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->tipo = $request->input('tipo');
        $operacion->save();
        return redirect()->route('admin.operaciones.index')->with('op.info','Operación modificada.');
    }

    public function destroy($id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();
        return redirect()->route('admin.operaciones.index')->with('op.info','Operación eliminada.');;
    }
}
