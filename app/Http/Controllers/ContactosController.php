<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Models\Contacto;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Session;

class ContactosController extends Controller
{
  public function index()
  {
    $sessionusuario = session('sessionusuario');
    $sessionid = session('sessionid');
    if ($sessionusuario <> "") {
      $notificacionusuario = Usuario::find($sessionid);
      return view('system.contactos.index', compact('notificacionusuario'));
      /*  return $contacto; */
    } else {
      Session::flash('mensaje', "Iniciar sesión antes de continuar");
      return redirect()->route('login');
    }
  }


  public function create()
  {
    $sessionusuario = session('sessionusuario');
    $sessionid = session('sessionid');
    if ($sessionusuario <> "") {
      $notificacionusuario = Usuario::find($sessionid);
      return view('system.contactos.create', compact('notificacionusuario'), [
        'servicios' => Servicio::select('id', 'nombre')->get()
      ]);
    } else {
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
    if ($sessionusuario <> "") {
      $where = array('id' => $request->id);
      $contacto = Contacto::where($where)->first();
      return response()->json($contacto);
    } else {
      Session::flash('mensaje', "Iniciar sesión antes de continuar");
      return redirect()->route('login');
    }
  }


  public function show($id)
  {
    $sessionusuario = session('sessionusuario');
    $sessionid = session('sessionid');
    if ($sessionusuario <> "") {
      $contacto = Contacto::findOrFail($id);
      $notificacionusuario = Usuario::find($sessionid);

      return view('system.contactos.show', compact('contacto', 'notificacionusuario'));
    } else {
      Session::flash('mensaje', 'Iniciar sesión antes de continuar');
      return redirect()->route('login');
    }
  }

  public function destroy_contactos($id)
  {
      Contacto::find($id)->delete();
   return response()->json(['success' => 'Contacto borrado']);
  }

  public function restore($id)
  {
    Contacto::withTrashed()->where('id',$id)->restore();
   return response()->json(['success' => 'Contacto restaurado']);
  }
  public function destroy(Contacto $contacto)
  {
    $message = "Desactivado";
    if (sizeof($contacto->clientes) < 1) {
      $contacto->forceDelete();
      $message = "Eliminado definitivamente";
    }
    $contacto->delete();
    if (request()->ajax()) {
      return response()->json([
        'contacto' => $contacto,
        'message' => $message,
      ], 201);
    }
    return redirect()
      ->route("contactos.index")
      ->withSuccess("El contacto $contacto->contacto1 se ha dado de baja exitosamente");
  }
  public function activeRecord($id)
  {
    $contacto = Contacto::onlyTrashed()
      ->find($id)
      ->restore();
    if ((request()->ajax())) {
      return response()->json([
        'contacto' => $contacto,
      ], 201);
    }
    return redirect()
      ->route("contactos.index")
      ->withSuccess("El contacto $contacto->contacto1 se ha dado de baja exitosamente");
  }
  public function RegistrosDatatables()
  {
    return datatables()
      ->eloquent(
        Contacto::query()
          /* ->withTrashed() */
          ->with(['servicios'])
      )
      ->toJson();
  }

}
