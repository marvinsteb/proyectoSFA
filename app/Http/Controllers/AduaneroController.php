<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;
use proyectoSeminario\Aduanero;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

class AduaneroController extends Controller
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
            $aduaneros = DB::table('aduaneroe as adu')
            ->select(
                'adu.idaduaneroe',
                'adu.fecha',
                'adu.numerodoc',
                'adu.correlativo',
                'prov.nombre as proveedor',
                'adu.descripcion',
                'adu.total'
            )
            ->join('proveedor as prov','prov.idproveedor','=','adu.idproveedor' )
            ->where('adu.descripcion','LIKE','%'.$query.'%')
            ->paginate(7);
            return view('import.aduanero.index',["aduaneros"=>$aduaneros,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $proveedores = DB::table('proveedor')->where('idtipo','=','2')->get();
        $vehiculos = DB::table('vehiculo')
        ->select(
            'vehiculo.idvehiculo',
            DB::raw('CONCAT(marca.nombreMarca,"-",mod.modelo, "-", vehiculo.lote ) as vehiculo')
            )
        ->where('estado','=','3')
        ->join('modelo as mod','mod.idmodelo','=','vehiculo.idmodelo' )
        ->join('marca','vehiculo.idmarca','=','marca.idmarca')
        ->get();
        return view("import.aduanero.create",["proveedores" => $proveedores,"vehiculos"=>$vehiculos ]);
    }
    public function store(Request $request)
    {
        $aduanero = new Aduanero;
        $aduanero->idproveedor = $request->get('idproveedor');
        $aduanero->idvehiculo = $request->get('idvehiculo');
        $aduanero->numerodoc =  $request->numerodoc;
        $aduanero->correlativo = $request->get('correlativo');
        $aduanero->fecha = Carbon::createFromFormat('d/m/Y',  $request->get('fechadocumento'))->format('Y-m-d');
        $aduanero->descripcion = $request->descripcion;
        $aduanero->total = $request->get('total');
        $aduanero->save();

        return Redirect::to('import/aduanero');
    }
}
