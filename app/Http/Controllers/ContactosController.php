<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Models\Contacto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
  public function index()
  {

    return view('system.contactos.index');
    /*  return $contacto; */
  }


public function create()
{
  return view('system.contactos.create',[
    'servicios' => Servicio::select('id','nombre')->get()
  ]);
}
  public function store(ContactoRequest $request)

  {

    $contacto = Contacto::create($request->validated());

    return redirect()
      ->route('contactos.index')
      ->withSuccess("El contacto $contacto->contacto1 se dio de alta correctamente");
    
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

          ->with(['servicios'])
      )
      ->toJson();
  }
}
