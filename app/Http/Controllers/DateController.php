<?php

namespace proyectoSeminario\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSeminario\Http\Requests;

class DateController extends Controller
{
    function showDate(Request $request)
    {
 
       dd($request->date);
    }
}
