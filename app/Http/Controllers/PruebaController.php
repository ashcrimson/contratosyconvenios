<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaController extends Controller
{
    public function index()
    {

        $apiUrl = 'https://mindicador.cl/api';

        if (request()->api_monedas==1){


            $res = Http::withOptions([
                            'proxy' => 'http://fpinoo:VPv52mqEjpwGgL2@172.25.10.11:3128',
                            'debug' => true
                        ])
                        ->get($apiUrl)->json();

            return $res;
        }

        if (request()->api_monedas==2){

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
