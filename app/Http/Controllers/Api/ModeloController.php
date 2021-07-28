<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
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
            'archivo' => 'required'
        ]);

        if($validator->fails()){
            //return $this->error($validator->errors(),412);
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Insertar

        $modelo = new Modelo();
        $modelo->archivo = $request->input('archivo');
        $res = $modelo->save();

        // Respuesta

        if ($res) {
            return response()->json(['message' => 'El modelo se han insertado correctamente'], 200);
        }
        return response()->json(['message' => 'Error insertando el modelo'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
