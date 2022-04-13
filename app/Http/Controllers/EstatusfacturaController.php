<?php

namespace App\Http\Controllers;

use App\Models\Estatufactura;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EstatusfacturaController extends Controller
{
    public function index()
    {
        $data['estatufacturas'] = Estatufactura::all();

        return view('system.estatufactura.index', $data);
    }

    public function store(Request $request)
    {

        $estatufactura   =   estatufactura::updateOrCreate(
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
        $estatufactura  = estatufactura::where($where)->first();

        return response()->json($estatufactura);
    }


    public function destroy(Request $request)
    {
        $estatufactura = estatufactura::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
    public function RegistrosDatatables(Request $request)
    {
        $estatufacturas = Estatufactura::latest()->get();
        
        if ($request->ajax()) {
            $data = Estatufactura::latest()->get();
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
      
        return view('estatufacturas.index',compact('estatufacturas'));
    }
}
