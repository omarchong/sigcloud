<?php

namespace App\Http\Controllers;

use App\Models\Estatuproyecto;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Yajra\DataTables\Facades\DataTables;


class EstatuproyectosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Estatuproyecto::latest()->get();
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

        return view('system.estatuproyecto.index');
    }

    public function store(Request $request)
    {

        $estatuproyecto   =   Estatuproyecto::updateOrCreate(
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
        $estatuproyecto  = Estatuproyecto::where($where)->first();

        return response()->json($estatuproyecto);
    }


    public function destroy(Request $request)
    {
        $estatuproyecto = Estatuproyecto::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
