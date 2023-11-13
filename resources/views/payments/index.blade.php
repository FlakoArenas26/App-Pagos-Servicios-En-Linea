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
    <div class="form-create">
        <h1 class="text-center">Registrar Nuevo Pago</h1>
        <div class="row mx-4">
            <div class="col-md-6 my-3 d-flex justify-content-start"></div>
            <div class="col-md-6 my-3 d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
            </div>
        </div>

        <form class="col col-4 mx-auto" action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select name="user_id" id="user_id" class="form-select">
                    <option value="">Seleccionar</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="service_id" class="form-label">Servicio</label>
                <select name="service_id" id="service_id" class="form-select" onchange="updateAmountOptions()">
                    <option value="">Seleccionar</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Valor</label>
                <select name="amount" id="amount_select" class="form-select">
                    <option value="">Seleccionar</option>
                    <!-- Las opciones se actualizarán dinámicamente con JavaScript -->
                </select>
            </div>

            <!-- Agrega el campo de contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            @if (session('error'))
                <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    // Cierra la alerta después de 5 segundos
                    setTimeout(function() {
                        document.getElementById('alert').style.display = 'none';
                    }, 5000);
                </script>
            @endif

            <script>
                function updateAmountOptions() {
                    // Obtén el valor seleccionado en el primer select
                    var selectedServiceId = document.getElementById("service_id").value;

                    // Obtén el segundo select
                    var amountSelect = document.getElementById("amount_select");

                    // Borra las opciones actuales en el segundo select
                    amountSelect.innerHTML = '<option value="">Seleccionar</option>';

                    // Agrega nuevas opciones basadas en el servicio seleccionado en el primer select
                    @foreach ($services as $service)
                        if ("{{ $service->id }}" == selectedServiceId) {
                            var option = document.createElement("option");
                            option.value = "{{ $service->amount }}"; // Utiliza el campo "amount"
                            option.text = "{{ floor($service->amount) }} COP"; // Trunca los decimales sin redondear
                            amountSelect.add(option);
                        }
                    @endforeach
                }
            </script>
            <button type="submit" class="btn btn-success">Registrar Pago</button>
        </form>



    </div>
    <div class="table-title my-5 py-5">
        <h1 class="text-center">Historial de Pagos</h1>
    </div>

    <div class="table-responsive mx-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID de Pago</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Servicio</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td class="text-center">{{ $payment->id }}</td>
                        <td class="text-center">{{ $payment->user->name }}</td>
                        <td class="text-center">{{ $payment->service->name }}</td>
                        <td class="text-center">${{ number_format($payment->amount, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $payment->date }}</td>
                        <td class="text-center">
                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
