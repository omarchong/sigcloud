<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('system.clientes.index', compact('clientes'));
    }



    public function create()
    {
        return view('system.clientes.create', [
            'contactos' => Contacto::select('id', 'contacto1')->get(),
            'estados' => Estado::select('id', 'nombre')->get(),
            'municipios' => Municipio::select('id', 'nombre')->get()

        ]);
    }

    public function store(ClienteRequest $request)
    {
        /* dd( $request->all() ); */


        $cliente = Cliente::create($request->validated());
        return redirect()
            ->route('clientes.index')
            ->withSuccess("El cliente $cliente->nombre se guardo correctamente");
    }

    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Cliente::query()
            )->toJson();
    }

    public function searchcontacto(Request $request)
    {
        $term = $request->get('term');

        $result = Contacto::where('contacto1', 'LIKE', '%' . $term . '%')
            ->select("contacto1")
            ->groupBy("contacto1")
            ->get();
        return response()->json($result);
    }

    public function estados()
    {
        $estados = DB::table('estados')->get();
        return view('system.clientes.index', compact('estados'));
    }

    public function getMunicipios(Request $request)
    {
        $municipios = DB::table('municipios')
            ->where('estado_id', $request->estado_id)
            ->get();
        if (count($municipios) > 0) {
            return response()->json($municipios);
        }
    }
}
