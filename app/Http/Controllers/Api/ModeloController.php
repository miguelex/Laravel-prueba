<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ModeloController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['only' => ['store']]);
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
    public function show($id)
    {
        $modelo =  Modelo::find($id);

        $archivo = $modelo->archivo;
        $fecha = $modelo->created_at;

        return response()->json(['Archivo' => $archivo,
                                 'Fecha creacion' => $fecha], 200);
    }

    public function ModeloReciente($fecha)
    {
        // Endpoint que devuelve el tamaño del modelo mas actual con respecto al timestamp que se le pasa


        // Transformación de epoch a DateTime
        $fecha = $fecha/1000;

        $dt = date(\DateTime::ISO8601,$fecha);
        $modelo = Modelo::where('created_at', '<=', $dt)->get()->last();

        return response()->json(['Fecha enviada' => $dt,
                                 'tamaño' => strlen($modelo->archivo),
                                 'fecha creación' => $modelo->created_at,
                                 'id' => $modelo->id], 200);
    }
}
