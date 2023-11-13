@extends('layouts.app')

@section('content')
    <h1 class="text-center">Pago de Servicios en Línea</h1>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('images/users.jpg') }}" class="card-img-top mx-auto my-auto" alt="Usuarios"
                        style="width: 200px; height: 150px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Usuarios</h5>
                        <a href="/users" class="btn btn-primary">Ver Usuarios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('images/services.jpg') }}" class="card-img-top mx-auto my-auto" alt="Servicios"
                        style="width: 200px; height: 150px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Servicios</h5>
                        <a href="/services" class="btn btn-primary">Ver Servicios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('images/payments.jpg') }}" class="card-img-top mx-auto my-auto" alt="Pagos"
                        style="width: 200px; height: 150px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pagos</h5>
                        <a href="/payments" class="btn btn-primary">Ver Pagos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
