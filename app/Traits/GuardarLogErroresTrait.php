<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait GuardarLogErroresTrait
{

    public function guardarLog($contenido)
    {
        $nombreClase = str_replace('App\\Console\\Commands\\','',get_class($this));

        if (!file_exists(storage_path('logs/comandos/'))){
            mkdir(storage_path('logs/comandos/'));
        }

        $file =storage_path('logs/comandos/'.'Log'.$nombreClase.'.txt');

        File::put($file,$contenido);
    }

}
