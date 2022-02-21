@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="row">
                        <div class="col-md-8">
                            <a id="tituloshow">
                                <h3 class="text-center mt-3">
                                    <i class="fas fa-user-graduate"></i>
                                    Información del estudiante
                                </h3>

                            </a>
                            <div class="row ml-4 mt-5">
                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Nombres</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->nombre }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Apellidos</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->apellidos }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Correo electrónico</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->email }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Teléfono</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->telefono }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Edad</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->age }} años</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h3 class="tittleshow">Nombres</h3>
                                    <a class="h4show">
                                        <p>{{ $estudiante->nombre }}</p>
                                    </a>
                                </div>

                            </div>
                            <a href="{{ route('estudiantes.index') }}" class="btn btn-primary mb-2 ml-4"> <i class="far fa-hand-point-left"></i>
                                Regresar</a>
                        </div>

                        <div class="col-md-4">
                            <h3 class="text-center mt-3">
                                <i class="fad fa-chalkboard"></i>
                                Información de grupo
                            </h3>
                            <div class="col-md-12 mt-3">
                                <h3 class="text-center">Semestre</h3>
                                <a class="h4show text-center">
                                    <p>{{ $grupo->semestre }}</p>
                                </a>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h3 class="text-center">Grupo</h3>
                                <a class="h4show text-center">
                                    <p>{{ $grupo->grupo }}</p>
                                </a>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h3 class="tittleshow text-center">Turno</h3>
                                <a class="h4show text-center">
                                    <p>{{ $grupo->turno }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
