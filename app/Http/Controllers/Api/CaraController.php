<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cara;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Api\CaraResource;

class CaraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['only' => ['store']]);
    }

    public function convert_from_latin1_to_utf8_recursively($dat)
   {
      if (is_string($dat)) {
         return utf8_encode($dat);
      } elseif (is_array($dat)) {
         $ret = [];
         foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

         return $ret;
      } elseif (is_object($dat)) {
         foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

         return $dat;
      } else {
         return $dat;
      }
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
            //Base64 a imagen
            $image = $request->imagen;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $imageName = $empleado->id .'.png';

            $dir = $empleado->id;


            Storage::disk('public')->put($dir.'/'.$imageName, base64_decode($image));

            //Guardar cara
            $cara = new Cara();
            $cara->imagen = $request->input('fragmento');
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
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($fecha)
    {
        /* Me devuelve todos los empleados y sus fragemntos que tengan fecha de actualizacion mayor o igual a la pasada por
        la url */

        $dt = date(\DateTime::ISO8601,$fecha/1000);

        return CaraResource::collection(Empleado::select("empleados.id",
                                                          "caras.imagen as fragmento"
                                                  )
                                                  ->join("caras", "caras.id", "=", "empleados.cara_id")
                                                  ->where('empleados.updated_at', '>=', $dt)
                                                  ->get());
    }


}
