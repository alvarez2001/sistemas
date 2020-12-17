@extends('layouts.LayoutHome')
@section('title', 'Modulo usuarios | Listar ')
@section('title-section', 'Listado de usuarios')
@section('second-content')
    <div class="row ">
        <div class="col-12 col-md-10  mx-auto">
            <div class="row justify-content-center">

                <div class="col-12">
                    @include('partials.msjSession')
                </div>

                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover text-center">
                        <thead class="bg-caritas-oscuro text-white">
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre y Apellido</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr>
                                    <th scope="row">
                                        <img width="50px" height="50px"
                                            src="{{ asset('images/thumbnails/' . $usuario->imagen) }}" alt="..."
                                            class="img-thumbnail">
                                    </th>
                                    <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->cedula }}</td>
                                    <td>{{ $usuario->correo }}</td>
                                    <td>{{ $usuario->Rol->rol }}</td>
                                    <td>
                                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf @method('DELETE')
                                            <button data-content="{{ $usuario->nombre . ' ' . $usuario->apellido }}"
                                                type="submit" class="btn btn-danger delete">Eliminar</button>
                                        </form>
                                        <a href="{{ route('usuarios.showFormEdit', $usuario) }}"
                                            class="btn btn-warning">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No existen usuarios registrados</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
