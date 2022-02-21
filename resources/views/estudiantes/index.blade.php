@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-card">
                        <div class="card-title"><i class="fas fa-users"></i> Gestion de estudiantes</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse mb-3">
                            <div class="p-2">
                                <a href="{{ route('estudiante.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Crear estudiante
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-white" style="background: #3f4570">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo electrónico</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Edad</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $estudiante->id }}</td>
                                            <td>{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</td>
                                            <td>{{ $estudiante->email }}</td>
                                            <td>{{ $estudiante->telefono }}</td>
                                            <td>{{ $estudiante->age }} años</td>
                                            <td>{{ $estudiante->grupo->grupo }}</td>

                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">

                                                        <a href="{{ route('estudiante.edit', [$estudiante->id]) }}"
                                                            class="btn btn-info text-white" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">

                                                        <form action="{{ route('estudiante.delete', [$estudiante->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')" title="Eliminar">
                                                                <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $estudiantes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
