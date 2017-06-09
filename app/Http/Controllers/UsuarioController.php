<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

use proyectoSFA\User;
use Illuminate\Support\Facades\Redirect;
use proyectoSFA\Http\Requests\SerieFormRequest;
use DB;

class UsuarioController extends Controller
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
            $usuarios = DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('users.id','desc')
            ->paginate(7);
            return view('configuracion/usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }
}
