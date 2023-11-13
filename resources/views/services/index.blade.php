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
    <h1 class="text-center">Lista de Servicios</h1>
    <div class="row mx-4">
        <div class="col-md-6 my-3">
            <a href="{{ route('services.create') }}" class="btn btn-success">Nuevo Servicio</a>
        </div>
        <div class="col-md-6 my-3 text-md-end">
            <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 mx-4">
        @foreach ($services as $service)
            <div class="col mb-4">
                <div class="card">
                    <div class="card-title">
                        <h5 class="card-title text-center mt-2">{{ $service->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Valor: {{ number_format($service->amount, 0, ',', '.') }} COP</p>
                        <div class="text-center">
                            <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('services.destroy', $service) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
