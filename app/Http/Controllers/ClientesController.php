<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
         return view('system.clientes.index', compact('clientes'));
    }


    public function create()
    {
        return view('system.clientes.create');
    }
}
