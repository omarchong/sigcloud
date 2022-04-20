<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Departamento;
use App\Models\Estatucotizacion;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionesController extends Controller

{

    public function buscacliente(Request $request)
    {
        $term = $request->get('term');

        $buscacliente =  DB::select("SELECT * FROM clientes WHERE nombreempresa  LIKE '%$term%'");


        return response()->json($buscacliente);
    }

    public function seleccionacliente(Request $request)
    {
        $cliente  = Cliente::where('nombreempresa', $request->cliente)->first();
        return response()->json($cliente);
    }


    public function buscaservicio(Request $request)
    {
        $term = $request->get('term');
        $buscaservicio = DB::select("SELECT * FROM servicios WHERE nombre LIKE '%$term%'");
        return response()->json($buscaservicio);
    }

    public function seleccionaservicio(Request $request)
    {
        $servicio = Servicio::where('nombre', $request->servicio)->first();
        return response()->json($servicio);
    }

    public function index()
    {
        return view('system.cotizaciones.index');
    }

    public function create()
    {
        return view('system.cotizaciones.create', [
            'estatuscotizaciones' => Estatucotizacion::select('id', 'nombre')->get()
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Cotizacion::query()
                    ->with([
                        'clientes'

                    ])
            )->toJson();
    }
}
