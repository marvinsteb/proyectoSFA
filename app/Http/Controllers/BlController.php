<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;
use DB;
use proyectoSeminario\Http\Requests\EmbarqueFormRequest;
use proyectoSeminario\Embarque;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class BlController extends Controller
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
            $embarques = DB::table('embarque')
            ->select(
                'embarque.idembarque',
				'embarque.barcoviaje',
                'embarque.lugarorigen',
                'embarque.fechaarribo',
                'embarque.descripcion',
                'embarque.numcontenedor',
                'embarque.fletemaritimo',
                'embarque.transporteinterno',
                'embarque.valordocumentacion',
                'embarque.total',
                'embarque.cargoservicio',
                DB::raw('CONCAT(marca.nombreMarca,"-",mod.modelo, "-", vehiculo.lote ) as vehiculo')
                )
            ->join('vehiculo','embarque.idvehiculo','=','vehiculo.idvehiculo')
            ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
            ->join('marca','vehiculo.idmarca','=','marca.idmarca')
            ->where('embarque.barcoviaje','LIKE','%'.$query.'%')

            ->orderBy('embarque.idembarque','asc')
            ->paginate(7);
            return view('import.embarque.index',["embarques"=>$embarques,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $vehiculos = DB::table('vehiculo')
        ->select(
            'vehiculo.idvehiculo',
            DB::raw('CONCAT(marca.nombreMarca,"-",mod.modelo, "-", vehiculo.lote ) as vehiculo')
            )
        ->where('estado','=','2')
        ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
        ->join('marca','vehiculo.idmarca','=','marca.idmarca')
        ->get();
        return view("import.embarque.create",["vehiculos" => $vehiculos ]);
    }
    public function store(EmbarqueFormRequest $request)
    {
        $flete = $request->get('fletemaritimo');
        $transporte = $request->get('transporteinterno');
        $valordoc = $request->get('valordocumentacion');
        $cargos = $request->get('cargosservicio');
        $total = $flete + $transporte + $valordoc + $cargos ;
        
        $fechaArribo = $request->get('fechaarribo');
        $date = Carbon::createFromFormat('d/m/Y', $fechaArribo)->format('Y-m-d');

         $embarque = new Embarque;
         $embarque->barcoviaje = $request->get('barcoviaje');
         $embarque->lugarorigen = $request->get('lugarorigen');
         $embarque->idvehiculo = $request->get('idvehiculo');        
         $embarque->fechaarribo = $date;
         $embarque->descripcion = $request->get('descripcion');
         $embarque->numcontenedor = $request->get('numcontenedor');
         $embarque->fletemaritimo = $flete;
         $embarque->transporteinterno = $transporte;
         $embarque->valordocumentacion = $valordoc;
         $embarque->cargoservicio = $cargos;
         $embarque->total = $total;
         $embarque->save();
         return Redirect::to('import/embarque');

    }
    public function show($id)
    {
      // return view("import.embarque.show",["embarque"=>embarque::findOrFail($id)]);
    }
    public function edit($id)
    {
        $embarque = embarque::findOrFail($id);
        $vehiculos = DB::table('vehiculo')
        ->select(
            'vehiculo.idvehiculo',
            DB::raw('CONCAT(mod.modelo, " ", marca.nombreMarca) as vehiculo')
            )
        ->where('estado','=','2')
        ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
        ->join('marca','vehiculo.idmarca','=','marca.idmarca')
        ->get();
        return view("import.embarque.edit",["embarque"=>$embarque,"vehiculos"=>$vehiculos]);
    }
    public function update(embarqueFormRequest $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
