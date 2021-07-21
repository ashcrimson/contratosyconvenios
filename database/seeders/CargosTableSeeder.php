<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cargos')->delete();
        
        \DB::table('cargos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'JEFE DE LA UNIDAD DE ADMISIÓN ABIERTA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'JEFE DE ABASTECIMIENTO Y FINANZAS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'JEFE DE BIENESTAR',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'JEFE DE CUENTAS CORRIENTES',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'JEFE FARMACIA HOSPITALIZADOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'JEFE DE LABORATORIO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'JEFE DE MEDICINA NUCLEAR',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'JEFE DE PREVENCIÓN DE RIESGO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'JEFE DE SECCIÓN INSUMOS CLÍNICOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'nombre' => 'JEFE DE SERVICIO MÁXILO FACIAL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'nombre' => 'JEFE DEL SERVICIO DE NEUROLOGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'nombre' => 'JEFE DEL SERVICIO DE PSIQUIATRIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 15,
                'nombre' => 'JEFE DEL SERVICIO DE HEMODINAMIA Y ANGIOGRAFIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 16,
                'nombre' => 'JEFE DEPTO AB Y FINANZAS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 17,
                'nombre' => 'JEFE DEPTO ABASTECIMIENTO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 18,
                'nombre' => 'JEFE DEPTO INGENIERÍA BIOMÉDICA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'nombre' => 'JEFE DEPTO IMAGENEOLOGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'nombre' => 'JEFE DEPTO INFORMÁTICA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'nombre' => 'JEFE DEPTO INGENIERÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'nombre' => 'JEFE DEPTO SOME',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'nombre' => 'JEFE DEPTO SUB DES HUMANO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'nombre' => 'JEFE DIV CONTROL EXISTENCIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'nombre' => 'JEFE PREV DE RIESGOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'nombre' => 'JEFE SECCIÓN CIRUGÍA CARDIACA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'nombre' => 'JEFE SECCIÓN CIRUGÍ?A MÍ?XILO FACIAL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'nombre' => 'NUTRICIONISTA JEFE DEL SEDILE',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'nombre' => 'JEFE SERV URETERÓSCOPIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 31,
                'nombre' => 'JEFE SERV. ESTERILIZACIÓN',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 32,
                'nombre' => 'JEFE SERV. OFTALMOLOGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 33,
                'nombre' => 'MATRONA JEFE DEL CAPS DE VINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 34,
                'nombre' => 'SUB.DIRECTOR DE ADMINISTRACIÓN Y FINANZAS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 35,
                'nombre' => 'SUB.DIRECTOR DE DESARROLLO HUMANO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 38,
                'nombre' => 'JEFE DEL GRUPO ASESORIA TECNICA PROYECTOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 39,
                'nombre' => 'JEFE DE CONTROL DE EXISTENCIAS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 40,
                'nombre' => 'JEFE DE SERVICIO ONCOLOGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 41,
                'nombre' => 'JEFE DIV COMERCIAL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 43,
                'nombre' => 'JEFE DEL SERVICIO DE DIÁLISIS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 44,
                'nombre' => 'JEFE DE SERVICIO DE TRAUMATOLOGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 45,
                'nombre' => 'JEFE FARMACIA AMBULATORIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 46,
                'nombre' => 'JEFE DE SERVICIO BANCO DE SANGRE',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 47,
                'nombre' => 'JEFE DE SERVICIO DE HEMATOLOGIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 48,
                'nombre' => 'JEFE DEL SERVICIO DE GINECOLOGIA Y OBSTETRICIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 49,
                'nombre' => 'JEFE DE NEUROCIRUGÍA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 50,
                'nombre' => 'JEFE DEL SERVICIO DE PEDIATRIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 51,
                'nombre' => 'SUBDIRECTOR CLÍNICO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 52,
                'nombre' => 'COORDINADORA DE HOTELERIA CLÍNICA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 53,
                'nombre' => 'JEFE DEL GRUPO ASESORIA TECNICA DE PROYECTOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 55,
                'nombre' => 'TECNOLOGO MEDICO DEL BANCO DE SANGRE',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 56,
                'nombre' => 'JEFE DE UNIDAD DE PACIENTES CRITICOS',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 57,
                'nombre' => 'JEFE DE UROLOGIA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}