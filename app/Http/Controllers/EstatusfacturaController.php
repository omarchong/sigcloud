<?php

namespace App\Http\Controllers;

use App\Models\Estatufactura;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class EstatusfacturaController extends Controller
{
    public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            if ($request->ajax()) {
                $data = Estatufactura::latest()->get();
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
            return view('system.estatufactura.index');
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {

        Estatufactura::updateOrCreate(
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

        $estatufactura  = estatufactura::find($id);
        return response()->json($estatufactura);
    }


    public function destroy($id)
    {
        $estatufactura = estatufactura::find($id)->delete();
        return response()->json(['success' => 'Estatus eliminado']);
    }
}
