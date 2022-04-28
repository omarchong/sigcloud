<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotizacionRequest;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\Estatucotizacion;
use App\Models\Servicio;
use Carbon\Carbon;
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
        return DB::transaction(function () use ($request) {

            $cotizacion = Cotizacion::create($request->all());
        
           
        

            
            foreach ($request->servicios_id as $index => $servicios_id) {
                $cotizacion->cotizaciones()->create([
                    'numero_servicios' => $request->numero_servicios[$index],
                    'fecha_estimadaentrega' => Carbon::now(),
                    'precio_bruto' => $request->precio_bruto[$index],
                    'precio_iva' => $request->precio_iva[$index],
                    'subtotal' => $request->subtotal[$index],                   
                    'cotizacion_id' => $cotizacion->id,
                    'servicios_id' => $servicios_id,
                ]);
            }

            return redirect()
                ->route('cotizaciones.index');
        });
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
