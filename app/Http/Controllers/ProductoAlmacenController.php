<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use proyectoSeminario\Http\Requests\ArticuloAlmacenFormRequest;
use proyectoSeminario\ProductoAlmacen;
use DB;

class ProductoAlmacenController extends Controller
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
            $productosalmacenes = DB::table('producto_almacen')
            ->where('inve.descripcion','LIKE','%'.$query.'%')
            ->join('inventario as inve','inve.id_inventario','=','producto_almacen.id_inve')
            ->join('almacen','almacen.idalmacen','=','producto_almacen.id_almacen')
            ->select('inve.id_inventario','inve.descripcion','almacen.nombre','producto_almacen.existencia')
            ->orderBy('producto_almacen.id_inve','desc')
            ->paginate(7);

            return view('inventario/productoalmacen.index',["productosalmacenes"=>$productosalmacenes,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $articulos = DB::table('inventario')->where('estado','=','1')->get();
        $almacenes = DB::table('almacen')->get();
        return view("inventario/productoalmacen.create",["articulos" => $articulos,"almacenes"=>$almacenes ]);
    } 
      public function store(ArticuloAlmacenFormRequest $request)
    {
         $productoalmacen = new ProductoAlmacen;
         $productoalmacen->id_inve = $request->get('id_inve');
         $productoalmacen->id_almacen = $request->get('id_almacen');
         $productoalmacen->existencia = $request->get('existencia');
         $productoalmacen->save();
         return Redirect::to('inventario/productoalmacen');

    } 
}
