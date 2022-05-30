<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Models\Contacto;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Session;

class ContactosController extends Controller
{
  public function index()
  {
    $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
      return view('system.contactos.index');
      /*  return $contacto; */
    }
    else{
        Session::flash('mensaje', "Iniciar sesión antes de continuar");
        return redirect()->route('login');
    }
  }


  public function create()
  {
    $sessionusuario = session('sessionusuario');
    if($sessionusuario<>"")
    {
      return view('system.contactos.create',[
        'servicios' => Servicio::select('id','nombre')->get()
      ]);
    }
    else{
        Session::flash('mensaje', "Iniciar sesión antes de continuar");
        return redirect()->route('login');
    }
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
    $sessionusuario = session('sessionusuario');
    if($sessionusuario<>"")
    {
      $where = array('id' => $request->id);
      $contacto = Contacto::where($where)->first();
      return response()->json($contacto);
    }
    else{
        Session::flash('mensaje', "Iniciar sesión antes de continuar");
        return redirect()->route('login');
    }
  }


  public function show($id)
  {
    $sessionusuario = session('sessionusuario');
    if($sessionusuario<>"")
    {
      $contacto = Contacto::findOrFail($id);
      return view('system.contactos.show', compact('contacto'));
    }
    else{
      Session::flash('mensaje', 'Iniciar sesión antes de continuar');
      return redirect()->route('login');
    }

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
