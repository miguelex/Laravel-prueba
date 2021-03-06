<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cara;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Api\CaraResource;
use Image;


class CaraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['only' => ['store']]);
    }

    /*public function convert_from_latin1_to_utf8_recursively($dat)
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
   }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validación para comprobar que hemos mandado todos los campos en la respuesta

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'imagen' => 'required',
            'fragmento' => 'required'
        ]);

        // Devuelvo error si no pasa la validación
        if($validator->fails()){
            //return $this->error($validator->errors(),412);
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Vemos si el empleado existe en la bd

        $idEmpleado = $request->input('id');

        $empleado = Empleado::find($idEmpleado);

        if ($empleado != null) // Existe
        {
            //Base64 a imagen
            $image = $request->imagen;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            //Guardar el fragmento
            $cara = new Cara();
            $cara->imagen = $request->input('fragmento');
            $res = $cara->save();

            $idCaraInsertada = $cara->id; // El id del fragmento que hemos insertado (nos hace falta para el nombre del archivo)
            $dir = $empleado->id; // Nombre de directorio (id del empleado)

            // En primer lugar, si previamente teniamos en Storage una foto, la borro

            if ($empleado->cara_id > 0)
            {
                Storage::disk('public')->delete($dir.'/original/'.$empleado->cara_id.'.png');
                Storage::disk('public')->delete($dir.'/modificado/'.$empleado->cara_id.'.png');
            }

            // Asociar

            $empleado->cara_id = $idCaraInsertada;
            $empleado->save();

            // Guardar imagen original en Storage

            $imageName = $idCaraInsertada .'.png'; //Nombre del fichero

            Storage::disk('public')->put($dir.'/original/'.$imageName, base64_decode($image));

            // Guardar imagen modificada en Storage

            $image_resize = Image::make($request->imagen);
            $image_resize->resize(800, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image_resize->orientate();
            $image_resize->encode('png');
            Storage::disk('public')->put($dir.'/modificado/'.$imageName, $image_resize);

            // Respuesta

            if ($res) {
                return response()->json(['message' => 'La imagen se han insertado correctamente'], 200);
            }

            return response()->json(['message' => 'Error insertando la imagen'], 500);
        }

        else // No existe
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
