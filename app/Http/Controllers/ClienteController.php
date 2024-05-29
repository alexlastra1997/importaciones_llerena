<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'documento_identificacion' => 'required|string|max:13|unique:clientes',
            'numero_telefono' => 'required|string|max:10',
            'correo' => 'required|string|email|max:255|unique:clientes',
            'direccion_vivienda' => 'required|string|max:255',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'documento_identificacion' => 'sometimes|required|string|max:255|unique:clientes,documento_identificacion,' . $cliente->id,
            'numero_telefono' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|string|email|max:255|unique:clientes,correo,' . $cliente->id,
            'direccion_vivienda' => 'sometimes|required|string|max:255',
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
