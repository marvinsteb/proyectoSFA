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
        $tiposdereparacion = DB::table('tiporeparacion')
        ->get();
        $marcas = DB::table('marca')->get();
        return view("inventario.repuesto.create",["tiposdereparacion" => $tiposdereparacion,"marcas"=>$marcas ]);
    }
    public function store(repuestoFormRequest $request)
    {

         $repuesto = new repuesto;
         $repuesto->descripcion = $request->get('descripcion');
         $repuesto->unidad = $request->get('unidad');
         $repuesto->idcategoria = $request->get('idcategoria');
         $repuesto->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/repuestos/',$file->getClientOriginalName());
            $repuesto->imagen=$file->getClientOriginalName();
         }
         
         */
         $repuesto->save();
         return Redirect::to('inventario/repuesto');

    }
    public function show($id)
    {
       
       return view("inventario.repuesto.show",["repuesto"=>repuesto::findOrFail($id)]);
    }
    public function edit($id)
    {
        $repuesto = repuesto::findOrFail($id);
        $tiposdereparacion = DB::table('categoria')->where('condicion','=','1')->get();
        return view("inventario.repuesto.edit",["repuesto"=>$repuesto,"tiposdereparacion"=>$tiposdereparacion]);
    }
    public function update(repuestoFormRequest $request, $id)
    {
         $repuesto = repuesto::findOrFail($id);
         $repuesto->descripcion = $request->get('descripcion');
         $repuesto->unidad = $request->get('unidad');
         $repuesto->idcategoria = $request->get('idcategoria');
         $repuesto->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/repuestos/',$file->getClientOriginalName());
            $repuesto->imagen=$file->getClientOriginalName();
         }
         
         */
         $repuesto->update();
         return Redirect::to('inventario/repuesto');
    }
    public function destroy($id)
    {
           $repuesto = repuesto::findOrFail($id);
           $repuesto->estado = 0;
           $repuesto->update();
           return Redirect::to('inventario/repuesto');
    }
}
