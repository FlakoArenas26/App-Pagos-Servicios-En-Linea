@extends('layouts.app')

@section('content')
    <h1 class="text-center">Editar Servicio</h1>
    <div class="col col-4 form mx-auto">
        <form method="post" action="{{ route('services.update', $service->id) }}">
            @csrf
            @method('PUT') <!-- Agrega este campo para indicar que es una solicitud PUT -->
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $service->name }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Valor:</label>
                <input type="number" name="amount" id="amount" class="form-control" value="{{ $service->amount }}"
                    required min="0">
            </div>
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
