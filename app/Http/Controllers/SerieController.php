<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use proyectoSFA\Http\Requests\SerieFormRequest;
use proyectoSFA\Serie;
use DB;



class SerieController extends Controller
{
        public function __construct()
    {

    }
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $series = DB::table('serie')
            ->where('serie.serie','LIKE','%'.$query.'%')
            ->orderBy('serie.idserie','desc')
            ->paginate(7);
            return view('configuracion/serie.index',["series"=>$series,"searchText"=>$query]);
        }

    }
    public function create()
    {
        return view("configuracion/serie.create");
    }
    
    public function store(SerieFormRequest $request)
    {
         $serie = new serie;
         $serie->tipo_documento = $request->get('tipodocumento');
         $serie->serie = $request->get('serie');
         $serie->resolucion = $request->get('resolucion');
         $serie->numero_inicial = $request->get('inicial');
         $serie->numero_final = $request->get('final');
         $serie->documento_siguiente = 1;
         $serie->estado = 1 ;
         $serie->save();
         return Redirect::to('configuracion/serie');

    }
    public function show($id)
    {
       
       return view("configuracion/serie.show",["serie"=>Serie::findOrFail($id)]);
    }
    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        return view("configuracion/serie.edit",["serie"=>$serie]);
    }
    public function update(SerieFormRequest $request, $id)
    {
         $serie = Serie::findOrFail($id);
         $serie->tipo_documento = $request->get('tipodocumento');
         $serie->serie = $request->get('serie');
         $serie->resolucion = $request->get('resolucion');
         $serie->numero_inicial = $request->get('inicial');
         $serie->numero_final = $request->get('final');
         $serie->update();
         return Redirect::to('configuracion/serie');
    }
    public function destroy($id)
    {
           $serie = Serie::findOrFail($id);
           $serie->estado = 0;
           $serie->update();
           return Redirect::to('configuracion/serie');
    }
}
