<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Giro;
use App\Models\Municipio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class ClientesController extends Controller
{
    public function index()
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.clientes.index', compact('notificacionusuario'));
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function create()
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */

            return view('system.clientes.create', compact('notificacionusuario'), [
                'contactos' => Contacto::select('id', 'contacto1')->get(),
                'estados' => Estado::select('id', 'nombre')->get(),
                'municipios' => Municipio::select('id', 'nombre')->get(),
                'giros' => Giro::select('id', 'nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }


    public function edit(Cliente $cliente)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.clientes.edit', compact('notificacionusuario'), [
                'cliente' => $cliente,
                'contactos' => Contacto::select('id', 'contacto1')->get(),
                'estados' => Estado::select('id', 'nombre')->get(),
                'municipios' => Municipio::select('id', 'nombre')->get(),
                'giros' => Giro::select('id', 'nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }
    /* actualizar cliente */
    public function update(ClienteRequest $request, cliente $cliente)
    {
        $cliente->update($request->validated());
        $cliente->save();
        return redirect()
            ->route('clientes.index')
            ->withSuccess("El cliente $cliente->nombreempresa se actualizo exitosamente");
    }

    public function store(ClienteRequest $request)
    {
        /* dd($request->all()); */
        $cliente = Cliente::create($request->validated());
        return redirect()
            ->route('clientes.index')
            ->withSuccess("El cliente $cliente->nombreempresa se guardo correctamente");
    }

    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Cliente::query()
                    ->with([
                        'giros',
                        'contactos'
                    ])

            )->toJson();
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

    public function searchcontacto(Request $request)
    {
        $term = $request->get('term');

        $result = Contacto::where('contacto1', 'LIKE', '%' . $term . '%')
            ->select("contacto1")
            ->groupBy("contacto1")
            ->get();
        return response()->json($result);
    }

    public function seleccionarcontacto(Request $request)
    {
        $cliente  = Contacto::where('contacto1', $request->cliente)->first();
        return response()->json($cliente);
    }
}
