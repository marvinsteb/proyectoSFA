<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use proyectoSeminario\Http\Requests\VendedorFormRequest;
use proyectoSeminario\Vendedor;
use DB;
use Carbon\Carbon;

class VendedorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $vendedores = DB::table('vendedor')
            ->where('vendedor.nombre','LIKE','%'.$query.'%')
            ->where('vendedor.estado','=','1')
            ->orderBy('vendedor.idvendedor','desc')
            ->paginate(7);
            return view('ventas/vendedor.index',["vendedores"=>$vendedores,"searchText"=>$query]);
        }

    }
    public function create()
    {
        return view("ventas/vendedor.create");
    }
    
    public function store(VendedorFormRequest $request)
    {

         $date = Carbon::now();
         $date = $date->toDateString();

         $vendedor = new Vendedor;
         $vendedor->nombre = $request->get('nombre');
         $vendedor->correo = $request->get('correo');
         $vendedor->telefono = $request->get('telefono');
         $vendedor->fecha_creacion =  $date;
         $vendedor->estado = 1 ;
         $vendedor->save();
         return Redirect::to('ventas/vendedor');

    }
    public function show($id)
    {
       
       return view("ventas/vendedor.show",["vendedor"=>Vendedor::findOrFail($id)]);
    }
    public function edit($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return view("ventas/vendedor.edit",["vendedor"=>$vendedor]);
    }
    public function update(VendedorFormRequest $request, $id)
    {
         $vendedor = vendedor::findOrFail($id);
         $vendedor->nombre = $request->get('nombre');
         $vendedor->correo = $request->get('correo');
         $vendedor->telefono = $request->get('telefono');
         $vendedor->update();
         return Redirect::to('ventas/vendedor');
    }
    public function destroy($id)
    {
           $vendedor = vendedor::findOrFail($id);
           $vendedor->estado = 0;
           $vendedor->update();
           return Redirect::to('ventas/vendedor');
    }
}
