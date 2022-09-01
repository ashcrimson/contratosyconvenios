<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('proveedores')->delete();

        // $proveedors = DB::connection('old')->table('PROVEEDORES')->orderBy('FECHA_CREACION')->get();

        // foreach ($proveedors as $index => $proveedor) {
        //     Proveedor::create([
        //         'rut' => $proveedor->rut_proveedor,
        //         'razon_social' => $proveedor->razon_social,
        //         'nombre_fantasia' => $proveedor->nombre_fantasia,
        //         'telefono' => $proveedor->telefono,
        //         'email' => $proveedor->email,
        //         'comuna' => $proveedor->comuna,
        //         'direccion' => $proveedor->direccion
        //     ]);
        // }


    // }
}
