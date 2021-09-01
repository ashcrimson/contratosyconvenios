<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function descargar(Documento $documento)
    {

        if (!$documento){
            flash('No se encontro el documento')->error();
            return redirect()->back();
        }




        if (is_null($documento->data)) {

            flash('El registro del documento no cuenta con el archivo')->error();
            return redirect()->back();
        }
        else {


            header("Content-type:" .$documento->mime_type);
            header('Content-Disposition: attachment; filename='.$documento->file_name);

            print $documento->data;
        }
    }

    public function eliminar(Documento $documento)
    {
        $documento->delete();

        flash('Documento eliminado')->success();

        return redirect()->back();
    }
}
