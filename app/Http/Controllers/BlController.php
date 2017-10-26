<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;
use DB;

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
                DB::raw('CONCAT(mod.modelo, " ", marca.nombreMarca) as vehiculo')
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
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();
        return view("import.embarque.create",["categorias" => $categorias ]);
    }
    public function store(embarqueFormRequest $request)
    {

         $embarque = new embarque;
         $embarque->descripcion = $request->get('descripcion');
         $embarque->unidad = $request->get('unidad');
         $embarque->idcategoria = $request->get('idcategoria');
         $embarque->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/embarques/',$file->getClientOriginalName());
            $embarque->imagen=$file->getClientOriginalName();
         }
         
         */
         $embarque->save();
         return Redirect::to('import/embarque');

    }
    public function show($id)
    {
       
       return view("import.embarque.show",["embarque"=>embarque::findOrFail($id)]);
    }
    public function edit($id)
    {
        $embarque = embarque::findOrFail($id);
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();
        return view("import.embarque.edit",["embarque"=>$embarque,"categorias"=>$categorias]);
    }
    public function update(embarqueFormRequest $request, $id)
    {
         $embarque = embarque::findOrFail($id);
         $embarque->descripcion = $request->get('descripcion');
         $embarque->unidad = $request->get('unidad');
         $embarque->idcategoria = $request->get('idcategoria');
         $embarque->estado = 1 ;
         /*
         if(Input::hasFile('imagen'))
         {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/embarques/',$file->getClientOriginalName());
            $embarque->imagen=$file->getClientOriginalName();
         }
         
         */
         $embarque->update();
         return Redirect::to('import/embarque');
    }
    public function destroy($id)
    {
           $embarque = embarque::findOrFail($id);
           $embarque->estado = 0;
           $embarque->update();
           return Redirect::to('import/embarque');
    }
}
