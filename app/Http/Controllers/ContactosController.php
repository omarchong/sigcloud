<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index()
    {
      /*   $contactos = Contacto::all(); */
        return view('system.contactos.index');
    }

    public function create()
    {
        return view('system.contactos.create');
    }

    public function store(ContactoRequest $request)
    {
        /* dd($request->all()); */
        $contacto = Contacto::create($request->validated());
        /*  Alert::success("El contacto $contacto->nombre se guardo correctamente"); */

        return redirect()
            ->route('contactos.index')
            ->withSuccess("El contacto $contacto->nombre se dio de alta correctamente");
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
