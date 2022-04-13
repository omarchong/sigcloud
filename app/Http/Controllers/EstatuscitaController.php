<?php

namespace App\Http\Controllers;

use App\Models\Estatucita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EstatuscitaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Estatucita::latest()->get();
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

        return view('system.estatucita.index');
    }

    public function store(Request $request)
    {

        $estatucita   =   Estatucita::updateOrCreate(
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
        $estatucita  = Estatucita::where($where)->first();

        return response()->json($estatucita);
    }


    public function destroy(Request $request)
    {
        $estatucita = Estatucita::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
