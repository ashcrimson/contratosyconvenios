<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaController extends Controller
{
    public function index()
    {

        if (request()->api_monedas==1){

            $uriApi = "https://mindicador.cl/api";

            $res = Http::get($uriApi)->json();

            return $res;
        }

        if (request()->api_monedas==2){
            $apiUrl = 'https://mindicador.cl/api';
            //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
            if ( ini_get('allow_url_fopen') ) {
                $json = file_get_contents($apiUrl);
            } else {
                //De otra forma utilizamos cURL
                $curl = curl_init($apiUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($curl);
                curl_close($curl);
            }

            $dailyIndicators = json_decode($json);

            dd($dailyIndicators);

        }


    }
}
