<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
            'contactos' => Contacto::select('id', 'contacto1')->get()
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
}
