<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use proyectoSeminario\Marca;
use Illuminate\Support\Facades\Redirect;
use proyectoSeminario\Http\Requests\MarcaFormRequest;
use DB;

class MarcaController extends Controller
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
            $marcas = DB::table('marca')
            ->where('nombreMarca','LIKE','%'.$query.'%')
            ->where('status','=','1')
            ->orderBy('idmarca','asc')
            ->paginate(7);
            return view('inventario.marca.index',["marcas"=>$marcas,"searchText"=>$query]);
        }

    }
    public function create()
    {
        return view("inventario.marca.create");
    }
    public function store(MarcaFormRequest $request)
    {
         $marca = new Marca;
         $marca->nombreMarca = $request->get('nombre');
         $marca->descripcion = $request->get('descripcion');
         $marca->status = 1;
         $marca->save();

         return Redirect::to('inventario/marca');

    }
    public function show($id)
    {
       return view("inventario.marca.show",["marca"=>Marca::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("inventario.marca.edit",["marca"=>Marca::findOrFail($id)]);
    }

    public function update(MarcaFormRequest $request, $id)
    {
         $marca = Marca::findOrFail($id);
         $marca->nombreMarca = $request->get('nombre');
         $marca->descripcion = $request->get('descripcion');
         $marca->update();
         return Redirect::to('inventario/marca');
    }
    public function destroy($id)
    {
           $marca = Marca::findOrFail($id);
           $marca->status = 0;
           $marca->update();
           return Redirect::to('inventario/marca');
    }
}
