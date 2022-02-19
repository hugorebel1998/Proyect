<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Http\Requests\EstudianteRequest;
use Illuminate\Http\Request;

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
        return view('estudiantes.create');
    }

    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->nombre = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->correo_electronico;
        $estudiante->telefono = $request->teléfono;
        $estudiante->edad = $request->fecha_nacimiento;

        // dd($estudiante);
        if($estudiante->save()){
            toastr()->success('Nuevo estudiante creado');
            return redirect()->to(route('estudiantes.index'));
        }else{
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));

    }

    public function update(Request $request)
    {
        $id = $request->estudiante_id;
        $estudiante = Estudiante::find($id);

        $request->validate([
            'nombre' => 'required|min:3|max:30',
            'apellidos' => 'required|min:4|max:45',
            'correo_electronico' => 'required|email|unique:estudiantes,email,'. $estudiante->id,
            'teléfono' => 'min:10|max:10|required',
            'fecha_nacimiento' => 'required'
        ]);

        $estudiante->nombre = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->correo_electronico;
        $estudiante->telefono = $request->teléfono;
        $estudiante->edad = $request->fecha_nacimiento; 

        // dd($estudiante);

        if($estudiante->update()){
            toastr()->info('Estudiante actualizado');
            return redirect()->to(route('estudiantes.index'));
        }else{
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
