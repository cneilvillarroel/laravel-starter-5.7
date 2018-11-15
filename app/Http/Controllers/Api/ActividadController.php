<?php

namespace App\Http\Controllers\Api;

use App\Actividad;
use App\Http\Controllers\Controller;


class ActividadController extends Controller
{

    public function listar(){

        $actividades = Actividad::all();

        return response()->json([
            'status' => 'OK desde actividad controller',
            'actividades' => $actividades
        ], 200);
    }

}