<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Estatucita;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CitasController extends Controller
{
    public function index()
    {
        return view('system.citas.index');
    }

    public function create()
    {   
        return view('system.citas.create',[
            'usuarios' => Usuario::select('id','nombre')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatucitas' => Estatucita::select('id','nombre')->get()
          ]);
    }

    public function store(CitaRequest $request)
    {    
        /* dd($request->all()); */

        $cita = Cita::create($request->validated());
        return redirect()
        ->route('citas.index')
        ->withSuccess("La cita $cita->nombre se creo correctamente");
    }

    public function edit(Cita $cita)
    {
        return view('system.citas.edit', [
            'cita' => $cita,
            'usuarios' => Usuario::select('id','nombre', 'usuario', 'email', 'telefono')->get(),
            'clientes' => Cliente::select('id','nombreempresa')->get(),
            'estatucitas' => Estatucita::select('id','nombre')->get(),
        ]);
    }

    public function update(CitaRequest $request, cita $cita)
    {   
        $cita->update();
        return redirect()
        ->route('citas.index')
        ->withSuccess("La cita $cita->nombre se actualizo exitosamente");
    }
    
    public function RegistrosDatatables()
    {
        return datatables()
      ->eloquent(
        Cita::query()
          ->with(['usuarios', 'clientes', 'estatucitas'])
      )
      ->toJson();
    }

    public function buscaempresa(Request $request)
    {
        $term = $request->get('term');

        $buscaempresa = DB::select("SELECT * FROM clientes WHERE nombreempresa LIKE '%$term%'");

        return response()->json($buscaempresa);
    }

    public function seleccionaempresa(Request $request)    
    {
        $cliente = Cliente::where('nombreempresa', $request->cliente)->first();
        return response()->json($cliente);
    }

    public function buscausuario(Request $request)
    {
        $term = $request->get('term');
        /* $buscausuario = DB::select("SELECT usu.nombre, email, depa.nombre FROM usuarios  usu
        INNER JOIN departamentos depa
        ON usu.id = depa.id WHERE usu.nombre LIKE '%r%'
        ORDER BY usu.nombre ASC"); */
        $buscausuario = DB::select("SELECT * FROM usuarios where nombre like '%$term%'");
        return response()->json($buscausuario);
    }

    public function seleccionausuario(Request $request)
    {
        $usuario = Usuario::where('nombre', $request->usuario)->first();
        return response()->json($usuario);
    }

}
