<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartamentosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Departamento::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('otros', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit"
                class="edit btn-sm editDepartament"><img src="/img/editar.svg" width="20px"></a>';

                    $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete"
                class="deleteDepartament"><img src="/img/basurero.svg"
                width="20px"></a>';
                    return $btn;
                })
                ->rawColumns(['otros'])
                ->make(true);
        }
        return view('system.departamentos.index');
    }


    public function store(Request $request)
    {
        Departamento::where('id', $request->id)->update([
            'abreviatura' => $request->abreviatura,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus,
            'n_empleados' => $request->n_empleados,

        ]);
        Departamento::create(array(
            'id' => $request->id,
            'abreviatura' => $request->abreviatura,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus,
            'n_empleados' => $request->n_empleados,
        ));
        return response()->json(['success' => 'El departamento se creo exitosamente']);
    }

    public function edit($id)
    {
        $query = Departamento::find($id);
        return response()->json($query);
    }
    public function destroy($id)
    {
        Departamento::find($id)->delete();
        return response()->json(['success' => 'departamento Borrado!']);
    }

   
}
