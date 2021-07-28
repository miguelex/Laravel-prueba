<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cara;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'imagen' => 'required'
        ]);

        if($validator->fails()){
            //return $this->error($validator->errors(),412);
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Vemos si el id existe en la bd

        $idEmpleado = $request->input('id');

        $empleado = Empleado::find($idEmpleado);

        if ($empleado != null)
        {
            //$file = $request->file('imagen');

            // Get the contents of the file
            //$contents = $file->openFile()->fread($file->getSize());

            $cara = new Cara();
            $cara->imagen = $request->input('imagen');
            $res = $cara->save();

            // Asociar

            $idCaraInsertada = $cara->id;

            $empleado->cara_id = $idCaraInsertada;
            $empleado->save();

            // Respuesta

            if ($res) {
                return response()->json(['message' => 'La imagen se han insertado correctamente'], 200);
            }
            return response()->json(['message' => 'Error insertando la imagen'], 500);
        }

        else
        {
            return response()->json(['message' => 'El usuario no existe'], 403);
        }





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
