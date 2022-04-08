<?php

namespace App\Http\Controllers;

use App\Models\Estatucotizacion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EstatuscotizacionController extends Controller
{
    public function index()
    {
        $data['estatucotizacions'] = Estatucotizacion::all();

        return view('system.estatucotizacion.index', $data);
    }

    public function store(Request $request)
    {

        $estatucotizacion   =   estatucotizacion::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nombre' => $request->nombre,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $estatucotizacion  = estatucotizacion::where($where)->first();

        return response()->json($estatucotizacion);
    }


    public function destroy(Request $request)
    {
        $estatucotizacion = estatucotizacion::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
    public function RegistrosDatatables(Request $request)
    {
        $estatucotizacions = Estatucotizacion::latest()->get();
        
        if ($request->ajax()) {
            $data = Estatucotizacion::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit"><img src="/img/editar.svg" width="20px"></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="delete"><img src="/img/basurero.svg" width="20px"></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('estatucotizacions.index',compact('estatucotizacions'));
    }
}
