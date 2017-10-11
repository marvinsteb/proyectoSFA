<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use proyectoSeminario\Proveedor;
use DB;
use Carbon\Carbon;


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
}
