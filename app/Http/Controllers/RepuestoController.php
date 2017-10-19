<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use DB;
use proyectoSeminario\Marca;
use proyectoSeminario\Modelo;
use proyectoSeminario\Repuesto;


class RepuestoController extends Controller
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
            $repuestos = DB::table('repuesto as rep')
            ->join('tiporeparacion as tipo','tipo.idtiporeparacion','=','rep.idtiporeparacion')
            ->join('modelo','modelo.idmodelo','=','rep.idmodelo')
            ->join('marca','marca.idmarca','=','rep.idmarca')
            ->select(
                    'rep.idrepuesto'
                    ,'rep.descripcion'
                    ,'rep.estado'
                    ,'rep.existencias'
                    ,'marca.nombreMarca'
                    ,'modelo.modelo'
                    ,'tipo.descripcion as tipo')
            ->where('rep.descripcion','LIKE','%'.$query.'%')
            ->where('rep.estado','=','1')
            ->orderBy('rep.idrepuesto','asc')
            ->paginate(30);
            return view('inventario.repuesto.index',["repuestos"=>$repuestos,"searchText"=>$query]);
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
        return view("inventario.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }
    public function update(ArticuloFormRequest $request, $id)
    {
         $articulo = Articulo::findOrFail($id);
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
