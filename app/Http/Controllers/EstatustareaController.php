<?php

namespace App\Http\Controllers;

use App\Models\Estatutarea;
use Illuminate\Http\Request;

class EstatustareaController extends Controller
{
  public function index()
  {
      $data['estatutareas'] = Estatutarea::all();

      return view('system.estatutarea.index', $data);
  }

  public function store(Request $request)
  {

      $estatutarea   =   Estatutarea::updateOrCreate(
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
      $estatutarea  = Estatutarea::where($where)->first();

      return response()->json($estatutarea);
  }


  public function destroy(Request $request)
  {
      $estatutarea = Estatutarea::where('id', $request->id)->delete();

      return response()->json(['success' => true]);
  }
}
