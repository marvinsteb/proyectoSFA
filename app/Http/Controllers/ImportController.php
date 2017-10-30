<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use proyectoSeminario\Http\Requests\FacturaiFormRequest;
use proyectoSeminario\Facturai;
use proyectoSeminario\FacturaiDetalle;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection; 

class ImportController extends Controller
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
            $facturas = DB::table('facturaimport as faci')
            ->join('facturaimportdetalle as fidt ','faci.idfactura','=','fidt.idfacturaimport')
            ->join('proveedor as prov','faci.proveedor_id','=','prov.idproveedor')
            ->select(
                'faci.idfactura',
                'faci.nofactura',
                DB::raw('CASE faci.estado WHEN 1 THEN "ACTIVO" ELSE "ANULADO" END as estado'),
                'faci.fecha_documento',
                'faci.fecha_creacion',
                'prov.nombre',
                DB::raw('sum(fidt.precio) total')
                )          
            ->groupBy(
                'faci.idfactura',
                'faci.nofactura',
                'faci.estado',
                'faci.fecha_documento',
                'faci.fecha_creacion',
                'prov.nombre')
            ->where('faci.idfactura','LIKE','%'.$query.'%')
            ->orderBy('faci.idfactura','desc')
            ->paginate(7);
            return view('import/facturaimport.index',["facturas"=>$facturas,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $proveedores = DB::table('proveedor')
                       ->where('proveedor.estado','=','1')
                       ->where('proveedor.idtipo','=','2')->get();
        $vehiculos = DB::table('vehiculo')->where('vehiculo.estado','=','1')
        ->select(
            'vehiculo.idvehiculo',
            DB::raw('CONCAT(marca.nombreMarca,"-",mod.modelo, "-", vehiculo.lote ) as vehiculo')
        )
        ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
        ->join('marca','vehiculo.idmarca','=','marca.idmarca')
        ->join('combustible','vehiculo.idcombustible','=','combustible.idcombustible')
        ->join('color','vehiculo.idcolor','=','color.idcolor')
        ->get();
        return view("import/facturaimport.create",["proveedores" => $proveedores,"vehiculos"=>$vehiculos ]);
    }
    
    public function store(FacturaiFormRequest $request)
    {
       /*try
        {
            DB::beginTransaction();
       */
                  $fechaactual = Carbon::now();
                  $fechaactual = $fechaactual->toDateString();

                  $fechaArribo = $request->get('fechadoc');
                  $fechaDoc = Carbon::createFromFormat('d/m/Y', $fechaArribo)->format('Y-m-d');

                  $factura = new Facturai;
                  $factura->nofactura = $request->get("nofactura");
                  $factura->estado = 1;
                  $factura->fecha_documento = $fechaDoc;
                  $factura->fecha_creacion = $fechaactual; 
                  $factura->proveedor_id = $request->get('idproveedor');
                  $factura->banco = $request->get('banco');
                  $factura->nocuentat = $request->get('nocuenta');
                  $factura->numerotrasferencia = $request->get('notransferencia');
                  $factura->montotransferencia = $request->get('montoransferencia');
  
                  $factura->total =  0;
                  $factura->save();
                  
                  $idvehiculo = $request->get('idvehiculo');
                  $costo = $request->get('costo');
         
                  $contador = 0;
                  while($contador < count($idvehiculo))
                  {
                    $detalle = new FacturaiDetalle;
                    $detalle->idfacturaimport = $factura->idfactura;
                    $detalle->id_vehiculo =  $idvehiculo[$contador];
                    $detalle->precio = $costo[$contador];
                    $detalle->subtotal = 0;
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
         return Redirect::to('import/importaciones');

    }
    public function show($id)
    {
        $factura = DB::table('factura as fac')
            ->join('serie as ser','fac.codigo_serie','=','ser.idserie')
            ->join('cliente as clie','fac.cliente_id','=','clie.idcliente')
            ->join('fac_detalle as dt','fac.idfactura','=','dt.idfactura')
            ->select('fac.idfactura','fac.numero_fac','ser.serie','fac.fecha_documento','fac.fecha_creacion','clie.nombre',DB::raw('sum(dt.cantidad*dt.precio) as total'))  
            ->where('fac.idfactura','=', $id)
            ->first();
       
       $detalle =DB::table('fac_detalle as dt')
                ->join('inventario as articulos','dt.id_inv'.'=','articulos.id_inventario')
                ->join('categoria','categoria.idcategoria','=','articulos.idcategoria')
                ->select('articulos.descripcion','articulos.unidad','categoria.nombre','dt.cantidad','dt.precio')
                ->where('dt.idfactura','=',$id)
                ->get();
       return view("import/facturaimport.show",["cliente"=>$factura,"detalles"=>$detalle]);
    }

    public function destroy($id)
    {
           $factura = Factura::findOrFail($id);
           $factura->estado = 0;
           $factura->update();
           return Redirect::to('import/facturaimport');
    }
}
