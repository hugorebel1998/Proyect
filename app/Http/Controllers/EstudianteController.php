<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grupo;
use App\Http\Requests\EstudianteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EstudianteController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->nombre = Str::title($request->nombre);
        $estudiante->apellidos = Str::title($request->apellidos);
        $estudiante->email = Str::lower($request->correo_electronico);
        $estudiante->telefono = $request->teléfono;
        $estudiante->edad = $request->fecha_nacimiento;
        $estudiante->grupo_id = $request->grupo;
        
        // dd($estudiante);

        $fechaNow = date('Y-m-d');
        if ($request->fecha_nacimiento === $fechaNow) {
            toastr()->warning('Edad no admitida');
            return redirect()->back();
        }

        $validateAlumno = Estudiante::where('nombre', $request->nombre)
            ->where('apellidos', $request->apellidos)
            ->count();
        if ($validateAlumno > 0) {
            toastr()->warning('Estudiante ya registrado');
            return redirect()->back();
        } else {
            //  dd($estudiante);
            if ($estudiante->save()) {
                toastr()->success('Nuevo estudiante creado');
                return redirect()->to(route('estudiantes.index'));
            } else {
                toastr()->error('Algo salio mal');
                return redirect()->back();
            }
        }
    }

    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $grupo = Grupo::findOrFail($estudiante->grupo_id);
        // dd($grupo);
        return view('estudiantes.show', compact('estudiante', 'grupo'));


    }

    public function edit($id)
    {
        $grupos = Grupo::all();
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante', 'grupos'));
    }

    public function update(Request $request)
    {
        $id = $request->estudiante_id;
        $estudiante = Estudiante::find($id);

        $request->validate([
            'nombre' => 'required|min:3|max:30',
            'apellidos' => 'required|min:4|max:45',
            'correo_electronico' => 'required|email|unique:estudiantes,email,' . $estudiante->id,
            'teléfono' => 'min:10|max:10|required',
            'fecha_nacimiento' => 'required'
        ]);

        $estudiante->nombre = Str::title($request->nombre);
        $estudiante->apellidos = Str::title($request->apellidos);
        $estudiante->email = Str::lower($request->correo_electronico);
        $estudiante->telefono = $request->teléfono;
        $estudiante->edad = $request->fecha_nacimiento;
        $estudiante->grupo_id = $request->grupo;


        $fechaNow = date('Y-m-d');
        if ($request->fecha_nacimiento === $fechaNow) {
            toastr()->warning('Edad no admitida');
            return redirect()->back();
        }
        // dd($estudiante);


            if ($estudiante->update()) {
                toastr()->info('Estudiante actualizado');
                return redirect()->to(route('estudiantes.index'));
            } else {
                toastr()->error('Algo salio mal');
                return redirect()->back();
            }
    
    }

    public function delete($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return back();
    }
}
