<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use proyectoSeminario\Http\Requests\VehiculoFormRequest;
use proyectoSeminario\Vehiculo;
use proyectoSeminario\Modelo;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection; 

class VehiculoController extends Controller
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
            $vehiculos = DB::table('vehiculo')
            ->select(
                'vehiculo.idvehiculo',
                'estado.estado',
                'marca.nombreMarca',
                'mod.modelo',
                'vehiculo.lote',
                'vehiculo.costo' ,
                'vehiculo.precio',
                'vehiculo.numpuertas',
                'combustible.combustible'
                ,'vehiculo.descripcion'
                ,'color.color'
                ,'mod.modelo')
            ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
            ->join('marca','vehiculo.idmarca','=','marca.idmarca')
            ->join('estado','estado.idestado','=','vehiculo.estado')
            ->join('combustible','vehiculo.idcombustible','=','combustible.idcombustible')
            ->join('color','vehiculo.idcolor','=','color.idcolor')
            ->where('marca.nombreMarca','LIKE','%'.$query.'%')
            ->orderBy('vehiculo.idvehiculo','desc')
            ->paginate(7);
            return view('inventario/vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
        }

    }
    public function create()
    {
         $marcas = DB::table('marca')->get();
         $combustibles = DB::table('combustible')->orderBy('combustible.idcombustible','desc')->get();  
         $colores = DB::table('color')->get(); 
         return view("inventario/vehiculo.create",["marcas" => $marcas
                                                  ,"combustibles"=>$combustibles
                                                  ,"colores"=>$colores]);
    }
    
    public function store(VehiculoFormRequest $request)
    {

        $vehiculo = new Vehiculo;
        $vehiculo->idmarca = $request->get('idmarca');
        $vehiculo->idmodelo = $request->get('idmodelo');
        $vehiculo->costo = 0.00; 
        $vehiculo->precio = $request->get('precio');      
        $vehiculo->anio = $request->get('anio');
        $vehiculo->llave = $request->get('llave');      
        $vehiculo->numpuertas = $request->get('numpuertas');
        $vehiculo->lote = $request->get('lote');
        $vehiculo->idcombustible = $request->get('idcombustible');
        $vehiculo->idcolor = $request->get('idcolor');
        $vehiculo->tipomotor = $request->get('tipomotor');
        $vehiculo->descripcion = $request->get('descripcion');
        $vehiculo->estado = 1 ;
        /*
        revisar para guardar imagen 
        if(Input::hasFile('imagen'))
        {
           $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
           $vehiculo->imagen=$file->getClientOriginalName();
        }
        
        */
        $vehiculo->save();
       
         return Redirect::to('inventario/vehiculo');

    }
    public function show($id)
    {
    }

    public function destroy($id)
    {        
    }
    public function getModelo(Request $request,$id)
    {
        if($request->ajax())
        {
            $modelos = Modelo::modeloPorMarca($id);
            return response()->json($modelos);
        }
    }
}
