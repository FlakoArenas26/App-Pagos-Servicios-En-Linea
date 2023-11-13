@extends('layouts.app')

@section('content')
    <h1 class="text-center">Crear Nuevo Usuario</h1>
    <div class="col col-4 form mx-auto">
        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <div class="button">
                    <button type="submit" class="btn btn-success my-2">Guardar</button>
                </div>
                <div class="col-md-6 my-2 text-end">
                    <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </form>
    </div>
@endsection
