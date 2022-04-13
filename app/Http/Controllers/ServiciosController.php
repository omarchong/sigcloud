<?php

namespace App\Http\Controllers;

use App\Models\Estatuservicio;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ServiciosController extends Controller
{
  public function index(Request $request)
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
    
    public function store(Request $request)
    {
        $servicio   =   Servicio::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'nombre' => $request->nombre, 
                        'descripcion' => $request->descripcion,
                        'precio_inicial' => $request->precio_inicial,
                        'precio_final' => $request->precio_final,
                    ]);
        return response()->json(['success' => true]);
    }
    
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $servicio  = Servicio::where($where)->first();
        return response()->json($servicio);
    }
 
   
    public function destroy(Request $request)
    {
        $servicio = Servicio::where('id',$request->id)->delete();
        return response()->json(['success' => true]);
    }

}
