<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;

class DepartamentosController extends Controller
{
    public function index(Request $request)
    {
        $sessionusuario = session('sessionusuario');
        $sessionid = session('sessionid');
        if($sessionusuario<>""){
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
            /* Variable notificacion */
            $notificacionusuario = Usuario::find($sessionid);
            /* Fin de la Variable notificacion */
            return view('system.departamentos.index', compact('notificacionusuario'));
        }
        else{
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }


    public function store(Request $request)
    {
        Departamento::updateOrCreate(
            ['id' => $request->id],
            [
                'abreviatura' => $request->abreviatura,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'estatus' => $request->estatus,
                'n_empleados' => $request->n_empleados,
            ]
        );
        return response()->json(['success' => 'Registro exitoso']);
    }

    public function edit($id)
    {
        $sessionusuario = session('sessionusuario');
        if ($sessionusuario <> "") {
            $query = Departamento::find($id);
            return response()->json($query);
        } else {
            Session::flash('mensaje', 'Iniciar sesión antes de continuar');
            return redirect()->route('login');
        }
    }
    public function destroy($id)
    {
        Departamento::find($id)->delete();
        return response()->json(['success' => 'departamento Borrado!']);
    }
}
