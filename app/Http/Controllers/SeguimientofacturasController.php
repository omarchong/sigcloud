<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientofacturaRequest;
use App\Models\Estatufactura;
use App\Models\Ordenpago;
use App\Models\Seguimientofactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class SeguimientofacturasController extends Controller
{
    public function index()
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.seguimientofacturas.index');
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function create()
    {   
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.seguimientofacturas.create',[
                'ordenpagos' => Ordenpago::select('id','folio')->get(),
                'estatufacturas' => Estatufactura::select('id','nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function store(SeguimientofacturaRequest $request)
    {    
        $seguimientofactura = Seguimientofactura::create($request->validated());
        return redirect()
        ->route('seguimientofacturas.index');
    }


    public function edit(Seguimientofactura $seguimientofactura)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('system.seguimientofacturas.edit', [
                'seguimientofactura' => $seguimientofactura,
                'ordenpagos' => Ordenpago::select('id','folio')->get(),
                'estatufacturas' => Estatufactura::select('id','nombre')->get(),
            ]); 
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function update(SeguimientofacturaRequest $request, seguimientofactura $seguimientofactura)
    {   
        $segf = $request->all();
        $seguimientofactura->update($segf);
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
