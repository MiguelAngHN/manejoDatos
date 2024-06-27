<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function viewpdf($id)
    {
        $ingresoSalida = DB::table('ingreso_salida_equipos')->where('id', $id)->first();

        $elementos = [];
        $idElementos = ['idElemento', 'idElemento2', 'idElemento3'];
        foreach ($idElementos as $column) {
            $elementoId = $ingresoSalida->{$column};
            if ($elementoId) {
                $elemento = DB::table('elementos')
                            ->select(
                                'elementos.*',
                                'estado_elementos.estado as estado_elemento'
                            )
                            ->leftJoin('estado_elementos', 'elementos.estado_id', '=', 'estado_elementos.id')
                            ->where('elementos.id', $elementoId)
                            ->first();

                if ($elemento) {
                    $elementos[] = $elemento;
                }
            }
        }


        $pdf = Pdf::loadView('pdf.pdf', compact('ingresoSalida', 'elementos'));
        return $pdf->stream('pdf.pdf');
    }
}
