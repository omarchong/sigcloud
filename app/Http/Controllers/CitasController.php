<?php

namespace App\Http\Controllers;

use App\Events\CitaEvent;
use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Estatucita;
use App\Models\Usuario;
use App\Notifications\CitaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Session;
 
class CitasController extends Controller
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
            return view('system.citas.index', compact('notificacionusuario'));
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
            return view('system.citas.create', compact('notificacionusuario'),[
                'usuarios' => Usuario::select('id','nombre')->get(),
                'clientes' => Cliente::select('id','nombreempresa')->get(),
                'estatucitas' => Estatucita::select('id','nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function store(CitaRequest $request)
    {    
        /* dd($request->all()); */

        $cita = Cita::create($request->validated());
        
        /* self::mi_cita_notificactions($cita); */
        event(new CitaEvent($cita));

        return redirect()
        ->route('citas.index')
        ->withSuccess("La cita $cita->nombre se creo correctamente");
    }
    /* public function mi_cita_notificactions($cita)
    {
        event(new CitaEvent($cita));
    } */

    public function edit(Cita $cita)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>"")
        {
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.citas.edit', compact('notificacionusuario'), [
                'cita' => $cita,
                'usuarios' => Usuario::select('id','nombre')->get(),
                'clientes' => Cliente::select('id','nombreempresa')->get(),
                'estatucitas' => Estatucita::select('id','nombre')->get()
            ]);
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function update(CitaRequest $request, Cita $cita)
    {   
        $cit = $request->all();
        $cita->update($cit);
        return redirect()
        ->route('citas.index')
        ->withSuccess("La cita $cita->nombre se actualizo exitosamente");
    }
    public function destroy_cita($id)
    {
        Cita::find($id)->delete();
        return response()->json(['success' => 'Cita borrado']);
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
