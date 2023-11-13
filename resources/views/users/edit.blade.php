@extends('layouts.app')

@section('content')
    <h1 class="text-center">Editar Usuario</h1>
    <div class="col col-4 form mx-auto">
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT') <!-- Agrega este campo para indicar que es una solicitud PUT -->
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-between">
                <div class="button">
                    <button type="submit" class="btn btn-warning my-2">Actualizar</button>
                </div>
                <div class="col-md-6 my-2 text-end">
                    <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </form>
    </div>
@endsection
