<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class ActividadesController extends Controller
{
    public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<> "")
        {
             /* Variable notificacion */
             $notificacionusuario = Usuario::find($sessionid);
             /* Fin de la Variable notificacion */
             
             $usuarios = Usuario::all();
            return view('system.actividad.index', compact('notificacionusuario', 'usuarios'));
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        Actividad::updateOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->input('nombre'),
                'tipoactividad' => $request->input('tipoactividad'),
                'fecha' => $request->input('fecha'),
                'nota' => $request->input('nota'),
                'usuario_id' => $request->input('usuario_id')
            ]
        );
        return response()->json(['succes' => true]);
    }
    public function edit($id)
    {
        $actividad = Actividad::find($id);
        return response()->json($actividad);
    }

    public function destroy($id)
    {
        Actividad::find($id)->delete();
        return response()->json(['success' => 'Actividad eliminada']);
    }

    public function RegistrosDatatables()
    {
        $actividades = Actividad::latest()->get();
        return datatables()
            ->eloquent(
                Actividad::query()
                ->with(['usuario'])
            )
            ->toJson();
    }
}
