@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-card">
                        <div class="card-title"><i class="fas fa-layer-group"></i> Gestion de grupos</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse mb-3">
                            <div class="p-2">
                                <a href="{{ route('grupo.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Crear grupo
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="text-white" style="background: #3f4570">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Turno</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ $grupo->id }}</td>
                                            <td>{{ $grupo->semestre }}</td>
                                            <td>{{ $grupo->grupo }}</td>
                                            <td>{{ $grupo->turno }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pl-2">

                                                        <a href="{{ route('grupo.edit', [$grupo->id]) }}"
                                                            class="btn btn-info text-white" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    <div class="pl-2">

                                                        <a href=""
                                                            class="btn btn-secondary" title="Ver estudiantes">
                                                            <i class="fad fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="pl-2">

                                                        <form action="{{ route('grupo.delete', [$grupo->id]) }}"
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
                        {{ $grupos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
