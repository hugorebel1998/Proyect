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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-white" style="background: #3f4570">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo electrónico</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Edad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $estudiante->id }}</td>
                                            <td>{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</td>
                                            <td>{{ $estudiante->email }}</td>
                                            <td>{{ $estudiante->telefono }}</td>
                                            {{-- <td>{{ $estudiante->age }} años</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $estudiantes->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
