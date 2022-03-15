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
       /*  return $contacto; */
    }



    public function store(Request $request)

  {

    $contacto = Contacto::updateOrCreate(
      [
        'id' => $request->id
      ],
      [
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono'  => $request->telefono,
        'descripcion' => $request->descripcion,
      ]
    );
    return response()->json(['success' => true]);
    /* dd($request->all()); */
    /*  $servicio = Servicio::create($request->validated());

    return redirect()
      ->route('servicios.index')
      ->withSuccess("El servicio $servicio->nombre se dio de alta correctamente"); */
  }

    public function edit(Request $request)
    {
      $where = array('id' => $request->id);
      $contacto = Contacto::where($where)->first();
      return response()->json($contacto);
    }


    public function show($id)
    {
        $contacto = Contacto::findOrFail($id);

        return view('system.contactos.show', compact('contacto'));
    }



    public function destroy(Request $request)
    {
      $contacto = Contacto::where('id', $request->id)->delete();
      return response()->json(['success' => true]);
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
