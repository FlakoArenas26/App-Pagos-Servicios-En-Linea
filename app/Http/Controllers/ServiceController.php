<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Mostrar lista de servicios
        $services = Services::all();
        return view('services.index', compact('services'));
    }

    public function show(Services $service)
    {
        // Mostrar detalles de un servicio
        return view('services.show', compact('service'));
    }

    public function create()
    {
        // Mostrar formulario para crear un nuevo servicio
        return view('services.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar el nuevo servicio en la base de datos
        // (Aquí deberías agregar lógica de validación según tus necesidades)
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Services::create($request->all());

        return redirect()->route('services.index')->with('success', 'Servicio creado exitosamente.');
    }

    public function edit(Services $service)
    {
        // Mostrar formulario para editar un servicio existente
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Services $service)
    {
        // Validar y actualizar la información del servicio en la base de datos
        // (Aquí deberías agregar lógica de validación según tus necesidades)
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(Services $service)
    {
        // Eliminar un servicio de la base de datos
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
