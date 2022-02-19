@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><i class="fas fa-user"></i> Crear estudiante</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('estudiante.store') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" name="apellidos"
                                        class="form-control @error('apellidos') is-invalid @enderror"
                                        value="{{ old('apellidos') }}">
                                    @error('apellidos')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="correo_electronico" class="form-label">Correo electrónico</label>
                                    <input type="email" name="correo_electronico"
                                        class="form-control @error('correo_electronico') is-invalid @enderror"
                                        value="{{ old('correo_electronico') }}">
                                    @error('correo_electronico')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="teléfono" class="form-label">Teléfono</label>
                                    <input type="text" name="teléfono"
                                        class="form-control @error('teléfono') is-invalid @enderror"
                                        value="{{ old('teléfono') }}">
                                    @error('teléfono')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-6 mt-2">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento"
                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                        value="{{ old('fecha_nacimiento') }}">
                                    @error('fecha_nacimiento')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
