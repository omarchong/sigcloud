<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientofacturaRequest;
use App\Models\Estatufactura;
use App\Models\Ordenpago;
use App\Models\Seguimientofactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeguimientofacturasController extends Controller
{
    public function index()
    {
        return view('system.seguimientofacturas.index');
    }

    public function create()
    {   
        return view('system.seguimientofacturas.create',[
            'ordenpagos' => Ordenpago::select('id','folio')->get(),
            'estatufacturas' => Estatufactura::select('id','nombre')->get()
          ]);
    }

    public function store(SeguimientofacturaRequest $request)
    {    
        $seguimientofactura = Seguimientofactura::create($request->validated());
        return redirect()
        ->route('seguimientofacturas.index');
    }


    public function edit(Seguimientofactura $seguimientofactura)
    {
        return view('system.seguimientofacturas.edit', [
            'seguimientofactura' => $seguimientofactura,
            'ordenpagos' => Ordenpago::select('id','folio')->get(),
            'estatufacturas' => Estatufactura::select('id','nombre')->get(),
        ]); 
    }

    public function update(SeguimientofacturaRequest $request, seguimientofactura $seguimientofactura)
    {   
        $seguimientofactura->update();
        return redirect()
        ->route('seguimientofacturas.index')
        ->withSuccess("El seguimiento factura se actualizo exitosamente");
    }  

    public function RegistrosDatatables()
    {
        return datatables()
      ->eloquent(
        Seguimientofactura::query()
          ->with(['ordenpagos', 'estatufacturas'])
      )
      ->toJson();
    }

    public function buscafolio(Request $request)
    {
        $term = $request->get('term');

        $buscafolio = DB::select("SELECT * FROM ordenpagos WHERE folio LIKE '%$term%'");

        return response()->json($buscafolio);
    }

    public function seleccionafolio(Request $request)    
    {
        $ordenpago = Ordenpago::where('folio', $request->ordenpago)->first();
        return response()->json($ordenpago);
    }



}
