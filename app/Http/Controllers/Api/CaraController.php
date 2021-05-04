<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cara;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Validator;

class CaraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validacion

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'puntos' => 'required'
        ]);

        if($validator->fails()){
            //return $this->error($validator->errors(),412);
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Inserccion

        $cara = new Cara();

        $cara->puntos = $request->input('puntos');

        $res = $cara->save();

        // Asociar

        $idCaraInsertada = $cara->id;
        $idEmpleado = $request->input('id');

        $empleado = Empleado::find($idEmpleado);
        $empleado->cara_id = $idCaraInsertada;
        $empleado->save();

        // Respuesta

        if ($res) {
            return response()->json(['message' => 'Los puntos se han insertado correctamente'], 200);
        }
        return response()->json(['message' => 'Error insertando los puntos'], 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cara  $cara
     * @return \Illuminate\Http\Response
     */
    public function show(Cara $cara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cara  $cara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cara $cara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cara  $cara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cara $cara)
    {
        //
    }
}
