@extends('layouts.app')

@if (session('success'))
    <div id="successAlert" class="container mt-3">
        <div class="alert alert-success col-6 mx-auto text-center alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
        }, 5000); // Oculta la alerta después de 5 segundos (5000 milisegundos)
    </script>
@endif

@if (session('danger'))
    <div id="dangerAlert" class="container mt-3">
        <div class="alert alert-danger col-6 mx-auto text-center alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('dangerAlert').style.display = 'none';
        }, 5000); // Oculta la alerta después de 5 segundos (5000 milisegundos)
    </script>
@endif



@section('content')
    <h1 class="text-center">Lista de Usuarios</h1>
    <div class="col col-8 row mx-auto">
        <div class="col-md-6 my-3">
            <a href="{{ route('users.create') }}" class="btn btn-success">Nuevo Usuario</a>
        </div>
        <div class="col-md-6 my-3 text-end">
            <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
        </div>
    </div>
    <div class="col col-8 table-responsive mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            {{-- <a href="{{ route('users.show', $user) }}" class="btn btn-info">Ver Detalles</a> --}}
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
