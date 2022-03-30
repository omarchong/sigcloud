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
                ->addColumn('otros', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editCustomer">Editar</a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteCustomer">Borrar</a>';
                    return $btn;
                })
                ->rawColumns(['otros'])
                ->make(true);
        }
        return view('system.actividad.index');
    }

    public function store(Request $request)
    {
        $actividad = Actividad::updateOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->nombre,
                'tipoactividad' => $request->tipoactividad,
                'fecha' => $request->fecha,
                'nota' => $request->nota
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
    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(Actividad::query())->tojson();
    }
}
