<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use proyectoSFA\Http\Requests\ArticuloFormRequest;
use proyectoSFA\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $articulos = DB::table('inventario as inve')
            ->join('categoria as cat','inve.idcategoria','=','cat.idcategoria')
            ->select('inve.id_inventario','inve.descripcion','inve.unidad','cat.nombre as categoria','inve.estado')
            ->where('inve.descripcion','LIKE','%'.$query.'%')
            ->where('inve.estado','=','1')
            ->orderBy('inve.id_inventario','asc')
            ->paginate(7);
            return view('inventario.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();
        return view("inventario.articulo.create",["categorias" => $categorias ]);
    }
    public function store(ArticuloFormRequest $request)
    {

         $articulo = new Articulo;
         $articulo->descripcion = $request->get('descripcion');
         $articulo->unidad = $request->get('unidad');
         $articulo->idcategoria = $request->get('idcategoria');
         $articulo->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
         }
         
         */
         $articulo->save();
         return Redirect::to('inventario/articulo');

    }
    public function show($id)
    {
       
       return view("inventario.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();
        return view("inventario.articulo.edit",["articulo"=>$articulo,"cagetorias"=>$categorias]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
        $articulo = new Articulo;
         $articulo->descripcion = $request->get('descripcion');
         $articulo->unidad = $request->get('unidad');
         $articulo->idcategoria = $request->get('idcategoria');
         $articulo->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
         }
         
         */
         $articulo->update();
         return Redirect::to('inventario/articulo');
    }
    public function destroy($id)
    {
           $articulo = Articulo::findOrFail($id);
           $articulo->estado = 0;
           $articulo->update();
           return Redirect::to('inventario/articulo');
    }

}
