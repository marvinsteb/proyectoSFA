<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

use proyectoSFA\Color;
use Illuminate\Support\Facades\Redirect;
use proyectoSFA\Http\Requests\ColorFormRequest;
use DB;

class ColorController extends Controller
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
            $colores = DB::table('color')
            ->where('color','LIKE','%'.$query.'%')
            ->orderBy('idcolor','asc')
            ->paginate(7);
            return view('inventario.color.index',["colores"=>$colores,"searchText"=>$query]);
        }

    }
}
