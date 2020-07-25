<?php

namespace App\Http\Controllers;

use URL;
use App\State;
use Illuminate\Http\Request;

class GasController extends Controller
{
    public function getallgases()
    {
        $places = URL::asset('assets/xml/places.xml');
        $xml = simplexml_load_file($places);
        $list = $xml->place;

        $gases = [];

        for ($i = 0; $i < count($list); $i++)
        {
            $tmp = [];
            $tmp['place_id'] = $list[$i]->attributes()->place_id[0] . '';
            $tmp['name'] = $list[$i]->name . '';
            $tmp['cre_id'] = $list[$i]->cre_id . '';
            $tmp['longitud'] = $list[$i]->location->x . '';
            $tmp['latitud'] = $list[$i]->location->y . '';

            array_push($gases, $tmp);
        }

        $response = [
            'success' => true,
            'results' => $gases
        ];

        return response()->json($response, 200);
    }

    public function getgas($place_id)
    {
        $places = URL::asset('assets/xml/places.xml');
        $xml = simplexml_load_file($places);

        $prices = URL::asset('assets/xml/prices.xml');
        $xml_price = simplexml_load_file($prices);

        $gases = [];

        $tmp = [
            'place_id' => $place_id,
            'name' => $xml->xpath('place[@place_id="'.$place_id.'"]/name')[0] . '',
            'cre_id' => $cre_id = $xml->xpath('place[@place_id="'.$place_id.'"]/cre_id')[0] . '',
            'longitud' => $longitud = $xml->xpath('place[@place_id="'.$place_id.'"]/location/x')[0] . '',
            'latitud' => $latitud = $xml->xpath('place[@place_id="'.$place_id.'"]/location/y')[0] . '',
        ];

        $gas_price = $xml_price->xpath('place[@place_id="'.$place_id.'"]/gas_price');
        for ($i=0; $i < count($gas_price) ; $i++) { 
            $tmp[$gas_price[$i]->attributes()->type . ''] = $gas_price[$i] .'';
        }

        array_push($gases, $tmp);

        $response = [
            'success' => true,
            'results' => $gases
        ];

        return response()->json($response, 200);
    }
}
