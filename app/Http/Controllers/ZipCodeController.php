<?php

namespace App\Http\Controllers;

use App\State;
use App\Municipality;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function getStates()
    {
        $states = State::all('clave', 'clave3', 'estado');

        return response()->json($states, 200);
    }

    public function getMunicipality($state)
    {
        $municipalities = Municipality::where('id_estado', $state)
            ->get(['municipio', 'c_mnpio']);

        return response()->json($municipalities, 200);
    }
}
