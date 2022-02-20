<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grupo;
use App\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;

class GrupoController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $grupos = Grupo::orderBy('id', 'desc')->paginate(15);
        return view('grupos.index', compact('grupos'));
    }
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('grupos.create', compact('estudiantes'));
    }

    public function store(GrupoRequest $request)
    {
        $grupo = new Grupo();
        $grupo->semestre = $request->semestre;
        $grupo->grupo = $request->grupo;
        $grupo->turno = $request->turno;
        $grupo->estudiante_id = $request->estudiante;

        

        if ($grupo->save()) {
            toastr()->success('Nuevo grupo creado con éxito');
            return redirect()->to(route('grupos.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo'));
    }

    public function update(GrupoRequest $request)
    {
        $id = $request->grupo_id;
        $grupo = Grupo::findOrFail($id);
        $grupo->semestre = $request->semestre;
        $grupo->grupo = $request->grupo;
        $grupo->turno = $request->turno;

        // dd($grupo);

        if ($grupo->update()) {
            toastr()->info('Grupo actualizado con éxito');
            return redirect()->to(route('grupos.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $grupo = Grupo::findOrFail($id);
        if ($grupo->delete()) {
            toastr()->success('Eliminaste este registro');
            return redirect()->back();
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    // public function estudiantesGrupo(Request $request,$id)
    // {
    //     $alumno = Estudiante::find($id);
    //     $estudiantes = Grupo::where('estudiante_id', $alumno)->get();
    //     return view('grupos.estudiantes', compact('estudiantes'));

    // }
}
