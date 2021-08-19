<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Ciudad;
use App\Models\Situacion;

use Illuminate\Support\Facades\Storage;

//use DataTables;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.empleados.index');
        $empleados = Empleado::select('empleados.id', 'empleados.nombre', 'empleados.apellidos', 'empleados.dni', 'empleados.codigoPostal', 'empleados.direccion', 'empleados.fechaNacimiento', 'empleados.cara_id' ,'situaciones.tipo', 'ciudades.nombre as ciudadNombre')
                            ->join ('situaciones','situaciones.id', '=','empleados.situacion_id')
                            ->join ('ciudades','ciudades.id', '=','empleados.ciudad_id')
                            ->orderBy('id', 'asc')
                            ->paginate(10);

        return view('admin.empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all()->pluck('nombre','id');
        $situaciones = Situacion::all()->pluck('tipo','id');
        return view('admin.empleados.create', compact('ciudades','situaciones'));
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'fecha' => 'required',
            'codigoPostal' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'situacion' => 'required',
        ]);

        $nuevoEmpleado = new Empleado;
        $nuevoEmpleado->nombre = $request->input('nombre');
        $nuevoEmpleado->apellidos = $request->input('apellidos');
        $nuevoEmpleado->dni = $request->input('dni');
        $nuevoEmpleado->fechaNacimiento = $request->input('fecha');
        $nuevoEmpleado->codigoPostal = $request->input('codigoPostal');
        $nuevoEmpleado->ciudad_id = $request->input('ciudad');
        $nuevoEmpleado->direccion = $request->input('direccion');
        $nuevoEmpleado->situacion_id = $request->input('situacion');
        $nuevoEmpleado->save();
        return redirect()->route('admin.empleados.index')->with('info','Empleado añadido.');
    }

    public function edit(Empleado $empleado)
    {
        $ciudades = Ciudad::all()->pluck('nombre','id');
        $situaciones = Situacion::all()->pluck('tipo','id');
        return view('admin.empleados.edit',compact('empleado','ciudades','situaciones'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->dni = $request->input('dni');
        $empleado->fechaNacimiento = $request->input('fecha');
        $empleado->codigoPostal = $request->input('codigoPostal');
        $empleado->ciudad_id = $request->input('ciudad');
        $empleado->direccion = $request->input('direccion');
        $empleado->situacion_id = $request->input('situacion');
        $empleado->save();
        return redirect()->route('admin.empleados.index')->with('info','Empleado modificada.');
    }

    public function show(Empleado $empleado)
    {
        $id = $empleado->id;
        $nombre = $empleado->nombre;
        $apellidos = $empleado->apellidos;

        return view('admin.empleados.show', compact('id','nombre','apellidos'));
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('admin.empleados.index')->with('info','Empleado eliminado.');;
    }

   /* // Metodo que usaremos en la llamada Ajax desde la vista
    public function getEmpleados(Request $request)
    {
        if ($request->ajax()) {
            $data = Empleado::select('empleados.id', 'empleados.nombre', 'empleados.apellidos', 'empleados.dni',
                                     'empleados.codigoPostal', 'empleados.direccion', 'empleados.cara_id as cara',
                                     'situaciones.tipo as situacion', 'ciudades.nombre as city')
                                     ->join ('situaciones','situaciones.id', '=','empleados.situacion_id')
                                     ->join ('ciudades','ciudades.id', '=','empleados.ciudad_id')
                                     ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Editar</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Borrar</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }*/
}
