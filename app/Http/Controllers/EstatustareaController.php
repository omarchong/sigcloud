<?php

namespace App\Http\Controllers;

use App\Models\Estatutarea;
use Illuminate\Http\Request;

class EstatustareaController extends Controller
{
    public function index()
  {
    $estatutareas = Estatutarea::all();
    return view("system.estatustareas.index");
  }
  public function store(Request $request)
  {
    $estatutareas = Estatutarea::updateOrCreate(
      [
        'id' => $request->id,
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
    $estatutareas = Estatutarea::where($where)->first();
    return response()->json($estatutareas);
  }

  public function RegistrosDatatables()
  {
    return datatables()
      ->eloquent(
        Estatutarea::query())
        ->toJson();
  }

  public function destroy(Request $request)
  {
    $estatutareas = Estatutarea::where('id', $request->id)->delete();
    return response()->json(['success' => true]);
  }
}
