<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index()
    {
        return view('system.contactos.index');
    }



    public function store(Request $request)
    {
        $contacto = Contacto::updatedOrCreate(
            ['id' => $request->id],
            [
                'nombre' => $request->nombre,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'descripcion' => $request->descripcion
            ]
        );
    return response()->json(['success' => true]);

        /*  $contacto = Contacto::create($request->validated());

        return redirect()
            ->route('contactos.index')
            ->withSuccess("El contacto $contacto->nombre se dio de alta correctamente"); */
    }
    public function edit(Request $request)
    {
      $where = array('id' => $request->id);
      $contacto = Contacto::where($where)->first();
      return response()->json($contacto);
    }
  




    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Contacto::query()
            )
            ->toJson();
    }
}
