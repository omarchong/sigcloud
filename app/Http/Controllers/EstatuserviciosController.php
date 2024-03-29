<?php

namespace App\Http\Controllers;

use App\Models\Estatuservicio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class EstatuserviciosController extends Controller
{
    public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            if ($request->ajax()) {
                $data = Estatuservicio::latest()->get();
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
            return view('system.estatuservicio.index');
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {

        $estatuservicio   =   estatuservicio::updateOrCreate(
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
        $estatuservicio  = estatuservicio::where($where)->first();

        return response()->json($estatuservicio);
    }


    public function destroy(Request $request)
    {
        $estatuservicio = estatuservicio::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
    
}
