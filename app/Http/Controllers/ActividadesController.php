<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActividadesController extends Controller
{
    public function index(Request $request)

    {
        if ($request->ajax()) {
            $data = Actividad::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '
                    " data-original-title="Edit" class="edit btn-sm edit"><img src="/img/editar.svg" width="20px"></a>';

                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '
                    " data-original-title="Delete" class="delete"><img src="/img/basurero.svg"
                width="20px"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('system.actividad.index');
    }

    public function store(Request $request)
    {
        $actividad = Actividad::updateOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->input('nombre'),
                'tipoactividad' => $request->input('tipoactividad'),
                'fecha' => $request->input('fecha'),
                'nota' => $request->input('nota')
            ]
        );
        return response()->json(['succes' => true]);
    }
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $actividad = Actividad::where($where)->first();

        return response()->json($actividad);
    }

    public function destroy(Request $request)
    {
        $actividad = Actividad::where('id', $request->id)->delete();
        return response()->json(['success' => true]);
    }
}
