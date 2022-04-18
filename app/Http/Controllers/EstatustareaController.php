<?php

namespace App\Http\Controllers;

use App\Models\Estatutarea;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EstatustareaController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
        $data = Estatutarea::latest()->get();
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

      return view('system.estatutarea.index');
  }

  public function store(Request $request)
  {

      Estatutarea::updateOrCreate(
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
      $estatutarea  = Estatutarea::find($id);
      return response()->json($estatutarea);
  }


  public function destroy($id)
  {
      $estatutarea = Estatutarea::find($id)->delete();
      return response()->json(['success' => true]);
  }
}
