<?php

namespace App\Http\Controllers;

use App\Models\estadoElemento;
use Illuminate\Http\Request;

class estadoElementoController extends Controller
{
    public function index()
    {
        $estadoElementos = estadoElemento::all();
        return view('estado_elementos.index', compact('estadoElementos'));
    }

    public function create()
    {
        return view('estado_elementos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        estadoElemento::create($request->all());
        return redirect()->route('estado_elementos.index');
    }

    public function show($id)
    {
        $estadoElemento = estadoElemento::findOrFail($id);
        return view('estado_elementos.show', compact('estadoElemento'));
    }

    public function edit($id)
    {
        $estadoElemento = estadoElemento::findOrFail($id);
        return view('estado_elementos.edit', compact('estadoElemento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $estadoElemento = estadoElemento::findOrFail($id);
        $estadoElemento->update($request->all());
        return redirect()->route('estado_elementos.index');
    }

    public function destroy($id)
    {
        $estadoElemento = estadoElemento::findOrFail($id);
        $estadoElemento->delete();
        return redirect()->route('estado_elementos.index');
    }
}
