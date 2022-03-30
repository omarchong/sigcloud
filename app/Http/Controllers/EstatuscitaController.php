<?php

namespace App\Http\Controllers;

use App\Models\Estatucita;
use Illuminate\Http\Request;

class EstatuscitaController extends Controller
{
    public function index()
    {
        $data['estatucitas'] = Estatucita::all();

        return view('system.estatucita.index', $data);
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
