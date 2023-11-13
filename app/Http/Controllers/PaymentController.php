<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Services;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function index()
    {
        $users = User::all(); // Asegúrate de obtener la lista de usuarios
        $services = Services::all(); // Asegúrate de obtener la lista de servicios
        $payments = Payments::all();

        // Mostrar formulario para crear un nuevo servicio
        return view('payments.index', compact('users', 'services', 'payments'));
    }

    public function create()
    {
        $users = User::all();
        $services = Services::all();
        $payments = Payments::all();

        return view('payments.create', compact('users', 'services', 'payments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'amount' => 'required|numeric|min:0',
            'password' => 'required',
        ]);

        $user = User::find($request->user_id);

        // Validate the user's password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', '¡Error! La contraseña del usuario es incorrecta. Verifica la contraseña e intenta nuevamente.');
        }

        // Use relationships to create the payment
        $payment = new Payments([
            'amount' => $request->amount,
            'date' => now(), // Adjust this as needed
        ]);

        $service = Services::find($request->service_id);

        // Associate relationships
        $payment->user()->associate($user);
        $payment->service()->associate($service);

        // Save the payment
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'Pago realizado exitosamente.');
    }

    public function show($id)
    {
        $payment = Payments::find($id);

        return view('payments.show', compact('payment'));
    }

    public function downloadPDF(Payments $payment)
    {
        // Puedes personalizar esta lógica según la estructura de tu PDF
        $pdf = Pdf::loadView('payments.pdf', compact('payment'));

        // Nombre del archivo PDF (puedes personalizar esto)
        $filename = 'payment_' . $payment->id . '.pdf';

        // Descargar el PDF en el navegador
        return $pdf->download($filename);
    }

}
