<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use Illuminate\Http\Request;

class ElementoController extends Controller
{
    public function index()
    {
        $elementos = Elemento::with('estado')->get();
        return view('elementos.index', compact('elementos'));
    }

    public function create()
    {
        $estados = \App\Models\estadoElemento::all();
        return view('elementos.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'serial' => 'required',
            'estado_id' => 'required|exists:estado_elementos,id',
        ]);

        Elemento::create($request->all());
        return redirect()->route('elementos.index');
    }

    public function show($id)
    {
        $elemento = Elemento::with('estado')->findOrFail($id);
        return view('elementos.show', compact('elemento'));
    }

    public function edit($id)
    {
        $elemento = Elemento::findOrFail($id);
        $estados = \App\Models\estadoElemento::all();
        return view('elementos.edit', compact('elemento', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'serial' => 'required',
            'estado_id' => 'required|exists:estado_elementos,id',
        ]);

        $elemento = Elemento::findOrFail($id);
        $elemento->update($request->all());
        return redirect()->route('elementos.index');
    }

    public function destroy($id)
    {
        $elemento = Elemento::findOrFail($id);
        $elemento->delete();
        return redirect()->route('elementos.index');
    }

    public function detalles($id) {
        $elemento = Elemento::with('estado')->findOrFail($id);
        return view('elementos.detalles', compact('elemento'));
    }
}
