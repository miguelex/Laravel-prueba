<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Situacion;
use Illuminate\Http\Request;

class SituacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $situaciones = Situacion::paginate(10);
        return view('admin.situaciones.index', compact('situaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.situaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required'
        ]);

        $situacion = Situacion::create($request->all());

        return redirect()->route('admin.situaciones.index')->with('info', 'La situación se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Situacion $situacione)
    {
        return view('admin.situaciones.edit', compact('situacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Situacion $situacione)
    {
        $request->validate([
            'tipo' => 'required'
        ]);

        $situacione->update($request->all());

        return redirect()->route('admin.situaciones.index')->with('info', 'La situacion se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Situacion $situacione)
    {
        $situacione->delete();

        return redirect()->route('admin.situaciones.index')->with('info','La operacion se eliminó con éxito.');
    }
}
