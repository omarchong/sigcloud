<?php

namespace App\Http\Controllers;

use App\Models\Estatuservicio;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;


class ServiciosController extends Controller
{
  public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<> "")
        {
            if ($request->ajax()) {
                $data = Servicio::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '
                        " data-original-title="Edit" class="edit btn-sm edit"><img src="/img/editar.svg" width="20px"></a>';

                        $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '
                        " data-original-title="Delete" class="delete"><img src="/img/basurero.svg" width="20px"></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('system.servicio.index');
        }
        else{
            Session::flash('mensaje', "Iniciar sesión antes de continuar");
            return redirect()->route('login');
        }
    }
    
    public function store_servicio(Request $request)
    {
        Servicio::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'nombre' => $request->nombre, 
                        'descripcion' => $request->descripcion,
                        'precio_inicial' => $request->precio_inicial,
                    ]);
        return response()->json(['success' => true]);
    }
    
    public function edit_servicio($id)
    {   
        $servicio  = Servicio::find($id);
        return response()->json($servicio);
    }
 
   
    public function destroy_servicio($id)
    {
        Servicio::find($id)->delete();
        return response()->json(['success' => 'Servicio borrado']);
    }

}
