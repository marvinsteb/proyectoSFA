<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

use proyectoSeminario\Http\Requests\ProveedorFormRequest;
use proyectoSeminario\Proveedor;


class ProveedorController extends Controller
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
            $proveedores = DB::table('proveedor')
            ->select('proveedor.idproveedor'
                      ,'proveedor.estado'
                      ,'proveedor.nombre' 
                      ,'proveedor.direccion' 
                      ,'proveedor.ciudad'
                      ,'proveedor.telefono'
                      ,'proveedor.nit' 
                      ,'proveedor.correo'
                      ,'proveedor.fecha_creacion'
                      ,'tipoprov.descripcion' )
            ->join('tipoprov','proveedor.idtipo','=','tipoprov.idtipoprov')
            ->where('proveedor.nombre','LIKE','%'.$query.'%')
            ->where('proveedor.estado','=','1')
            ->orderBy('proveedor.idproveedor','desc')
            ->paginate(7);
            return view('import/proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $tipoDeProveedores = DB::table('tipoprov')->get();
        return view("import/proveedor.create",["tipoDeProveedores"=>$tipoDeProveedores]);
    }
    public function store(ProveedorFormRequest $request)
    {
        $date = Carbon::now();
        $date = $date->toDateString();
        $proveedor = New Proveedor;
        $proveedor->nombre = $request->get('nombre');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->ciudad = $request->get('ciudad');
        $proveedor->idtipo = $request->get('idtipo');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->nit = $request->get('nit');
        $proveedor->correo = $request->get('correo');
        $proveedor->fecha_creacion =  $date;
        $proveedor->estado = 1 ;
        $proveedor->save();
        return Redirect::to('import/proveedor');


    }
    
}
