<?php

namespace proyectoSFA\Http\Controllers;

use Illuminate\Http\Request;

use proyectoSFA\Http\Requests;

class DateController extends Controller
{
    function showDate(Request $request)
    {
 
       dd($request->date);
    }
}
