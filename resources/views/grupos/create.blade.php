@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white"  style="background: #3f4570">
                        <div class="card-title"><i class="fas fa-ad"></i> Crear grupo</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('grupo.store') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="semestre" class="form-label">Semestre</label>
                                    <input type="text" name="semestre"
                                        class="form-control @error('semestre') is-invalid @enderror"
                                        value="{{ old('semestre') }}">
                                    @error('semestre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-12 mt-2">
                                    <label for="grupo" class="form-label">Grupo</label>
                                    <input type="text" name="grupo"
                                        class="form-control @error('grupo') is-invalid @enderror"
                                        value="{{ old('grupo') }}">
                                    @error('grupo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label class="text-label">Turno</label>
                                        <select name="turno"
                                            class="custom-select select2bs4 @error('turno') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="">-- Selecciona una opcion --</option>
                                            <option value="Matutino" @if (old('turno') == 'Matutino') selected="selected" @endif }}>Matutino</option>
                                            <option value="Vespertino" @if (old('turno') == 'Vespertino') selected="selected" @endif }}>Vespertino</option>
                                        </select>
                                        @error('turno')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="estudiante">Estudiante </label>
                                        <select name="estudiante" class="form-control @error('estudiante') is-invalid @enderror">
                                            <option value="" selected>-- Selecciona un estudiante --</option>
                                            @foreach ($estudiantes as $estudiante)
                                                <option value="{{ $estudiante->id }}" {{ old('estudiante') == $estudiante->id ? 'selected' : '' }}>
                                                {{ $estudiante->nombre }} {{ $estudiante->apellidos }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('estudiante')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>                                  
                                </div>



                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                    Guardar grupo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
