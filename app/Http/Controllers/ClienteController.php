<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use proyectoSFA\Http\Requests\ClienteFormRequest;
use proyectoSFA\Cliente;
use DB;
use Carbon\Carbon;
class ClienteController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $clientes = DB::table('cliente')
            ->where('cliente.nombre','LIKE','%'.$query.'%')
            ->where('cliente.estado','=','1')
            ->orderBy('cliente.idcliente','desc')
            ->paginate(7);
            return view('ventas/cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }

    }
    public function create()
    {
        return view("ventas/cliente.create");
    }
    
    public function store(ClienteFormRequest $request)
    {

         $date = Carbon::now();
         $date = $date->toDateString();

         $cliente = new Cliente;
         $cliente->nombre = $request->get('nombre');
         $cliente->direccion = $request->get('direccion');
         $cliente->telefono = $request->get('telefono');
         $cliente->nit = $request->get('nit');
         $cliente->correo = $request->get('correo');
         $cliente->fecha_creacion =  $date;
         $cliente->saldo = 0.00;
         $cliente->estado = 1 ;
         $cliente->save();
         return Redirect::to('ventas/cliente');

    }
    public function show($id)
    {
       
       return view("ventas/cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view("ventas/cliente.edit",["cliente"=>$cliente]);
    }
    public function update(ClienteFormRequest $request, $id)
    {
         $cliente = Cliente::findOrFail($id);
         $cliente->nombre = $request->get('nombre');
         $cliente->direccion = $request->get('direccion');
         $cliente->telefono = $request->get('telefono');
         $cliente->nit = $request->get('nit');
         $cliente->correo = $request->get('correo');
         $cliente->update();
         return Redirect::to('ventas/cliente');
    }
    public function destroy($id)
    {
           $cliente = Cliente::findOrFail($id);
           $cliente->estado = 0;
           $cliente->update();
           return Redirect::to('ventas/cliente');
    }
}
