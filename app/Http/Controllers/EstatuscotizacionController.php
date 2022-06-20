<?php

namespace App\Http\Controllers;

use App\Models\Estatucotizacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class EstatuscotizacionController extends Controller
{
    public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>""){
            if ($request->ajax()) {
                $data = Estatucotizacion::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit"
                    class="edit btn-sm edit"><img src="/img/editar.svg" width="20px"></a>';
    
                        $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete"
                    class="delete"><img src="/img/basurero.svg"
                    width="20px"></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.estatucotizacion.index', compact('notificacionusuario'));
        }
        else
        {
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {

        Estatucotizacion::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nombre' => $request->nombre,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $estatucotizacion = Estatucotizacion::find($id);
        return response()->json($estatucotizacion);
    }


    public function destroy($id)
    {
        Estatucotizacion::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
