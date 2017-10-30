<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\repades\Input;
use proyectoSeminario\Reparacion;
use proyectoSeminario\Vehiculo;
use proyectoSeminario\ReparacionDetalle;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection; 

class ReparacionController extends Controller
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
            $reparaciones = DB::table('reparacion as rep')
            ->select(
                'rep.idreparacion',
                'rep.fecha_inicio',
                'rep.fecha_fin',
                DB::raw('sum((rdeta.cantidad*rdeta.costo)) as costoreal'),
                DB::raw('CONCAT(marca.nombreMarca," ",mod.modelo) as vehiculo')
                )
            ->join('reparacion_detalle as rdeta','rdeta.idreparacion','=','rep.idreparacion')
            ->join('vehiculo as vehi','rep.idvehiculo','=','vehi.idvehiculo')
            ->join('modelo as mod','mod.idmodelo','=','vehi.idmodelo' )
            ->join('marca','vehi.idmarca','=','marca.idmarca')
            ->groupBy(               
            'rep.idreparacion',
            'rep.fecha_inicio',
            'rep.fecha_fin')
           ->where('marca.nombreMarca','LIKE','%'.$query.'%')
            ->paginate(7);
            return view('taller/reparacion.index',["reparaciones"=>$reparaciones,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $vehiculos = DB::table('vehiculo')
        ->select(
            'vehiculo.idvehiculo',
            DB::raw('CONCAT(marca.nombreMarca,"-",mod.modelo, "-", vehiculo.lote ) as vehiculo')
            )
        ->where('estado','=','4')
        ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
        ->join('marca','vehiculo.idmarca','=','marca.idmarca')
        ->get();
        $tipodereparaciones = DB::table('tiporeparacion')->get();
        $repuestos = DB::table('repuesto')->get();
        return view("taller/reparacion.create",["vehiculos" => $vehiculos,"tipodereparaciones" => $tipodereparaciones,"repuestos" => $repuestos ]);
    }
    
    public function store(Request $request)
    {
       /*try
        {
            DB::beginTransaction();
      'idreparacion',
      'idtiporeparacion',
      'fecha_inicio',
      'fecha_fin',
      'costoestimado',
      'desviacion',
      'costoreal',
      'idvehiculo',
                 $calculoCostoReal = 
       */


                 $reparacion = new Reparacion;
                 $reparacion->idvehiculo = $request->idvehiculo;
                 $reparacion->idtiporeparacion = $request->idtiporapracion;
                 $reparacion->fecha_inicio = Carbon::createFromFormat('d/m/Y',  $request->get('fechainicio'))->format('Y-m-d'); 
                 $reparacion->save();
                  
                 $idrepuesto = $request->get('idrepuesto');
                 $cantidad = $request->get('cantidad');
                 $costo = $request->get('costo');
                 $descripcion = $request->get('descripcion');
         
                 $contador = 0;
                 while($contador < count($idrepuesto))
                 {
                   $detalle = new ReparacionDetalle;
                   $detalle->idreparacion = $reparacion->idreparacion;
                   $detalle->idrepuesto =  $idrepuesto[$contador];
                   $detalle->cantidad = $cantidad[$contador];
                   $detalle->costo = $costo[$contador];
                   $detalle->descripcion = $descripcion[$contador];
                   $detalle->save();

                   $contador = $contador + 1;
                 }               
    
    /*        DB::commit();
   
        }
        catch (\Exception $e) 
        {
            DB::rollback();      
        }  
¨*/
         return Redirect::to('taller/reparacion');

    }
    public function show($id)
    {
       $reparacion = DB::table('reparacion as rep')
           ->join('serie as ser','rep.codigo_serie','=','ser.idserie')
           ->join('cliente as clie','rep.cliente_id','=','clie.idcliente')
           ->join('rep_detalle as dt','rep.idreparacion','=','dt.idreparacion')
           ->select('rep.idreparacion','rep.numero_rep','ser.serie','rep.fecha_documento','rep.fecha_creacion','clie.nombre',DB::raw('sum(dt.cantidad*dt.costo) as total'))  
           ->where('rep.idreparacion','=', $id)
           ->first();
       
      $detalle =DB::table('rep_detalle as dt')
               ->join('inventario as articulos','dt.id_inv'.'=','articulos.id_inventario')
               ->join('categoria','categoria.idcategoria','=','articulos.idcategoria')
               ->select('articulos.descripcion','articulos.unidad','categoria.nombre','dt.cantidad','dt.costo')
               ->where('dt.idreparacion','=',$id)
               ->get();
      return view("taller/reparacion.show",["cliente"=>$reparacion,"detalles"=>$detalle]);
    }

    public function destroy($id)
    {
        $date = Carbon::now();
        $date = $date->toDateString();  
        $reparacion = Reparacion::findOrFail($id);
        $reparacion->fecha_fin = $date;
        $reparacion->update();
        $vehiculo = Vehiculo::findOrFail($reparacion->idvehiculo);
        $vehiculo->estado = 6;
        $vehiculo->update();
        return Redirect::to('taller/reparacion');
    }
}
