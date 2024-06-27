<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoSalidaEquipoController extends Controller
{
    public function index()
    {
        $ingresos_salidas = DB::table('ingreso_salida_equipos')->get();
        return view('ingreso_salida.index', compact('ingresos_salidas'));
    }

    public function create()
    {
        $elementos = DB::table('elementos')->get();
        return view('ingreso_salida.create', compact('elementos'));
    }

    public function store(Request $request)
    {
        DB::table('ingreso_salida_equipos')->insert([
            'motivo_ingreso' => $request->motivo_ingreso,
            'fecha_in_ingreso' => $request->fecha_in_ingreso,
            'fecha_fin_salida' => $request->fecha_fin_salida,
            'hora' => $request->hora,
            'idUser' => $request->idUser,
            'idElemento' => $request->idElemento,
            'idElemento2' => $request->idElemento2,
            'idElemento3' => $request->idElemento3,
            'descripcionElemento' => $request->descripcionElemento,
            'descripcionElemento2' => $request->descripcionElemento2,
            'descripcionElemento3' => $request->descripcionElemento3,
        ]);

        return redirect()->route('ingreso_salida_equipos.index')
                         ->with('success', 'Registro creado con éxito.');
    }
}
