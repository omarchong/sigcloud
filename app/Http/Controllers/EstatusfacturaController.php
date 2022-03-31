<?php

namespace App\Http\Controllers;

use App\Models\Estatufactura;
use Illuminate\Http\Request;

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
    public function RegistrosDatatables()
    {
        return datatables()
        ->eloquent(
            Estatufactura::query()
        )->toJson();
    }
}
