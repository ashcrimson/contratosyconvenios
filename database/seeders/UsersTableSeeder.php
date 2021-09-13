<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        /**
         * Usuarios migracos
         */
        $usuarios = DB::connection('old')->table('USUARIOS')->orderBy('ID_USUARIO')->get();


        foreach ($usuarios as $index => $user) {

            $username = (strstr($user->mail, '@', true) . "");

            /**
             * @var User $newUser
             */
            $newUser = User::create([
                'id' => $user->id_usuario,
                'username' => $username,
                'name' => $user->nombre,
                'email' => $user->mail,
                'password' => bcrypt("123"),
                'area_id' => $user->id_area,
                'cargo_id' => $user->id_cargo,
            ]);

            $rol = $this->getRole($user->id_permiso);


            if ($rol){
                $newUser->syncRoles([$rol]);
            }

            $opciones = $this->getOptions($user->id_permiso);

            if ($opciones){
                $newUser->options()->sync($opciones);
            }

        }

        $maxId = $usuarios->max('id_usuario');

        setStartValSequence('USERS_ID_SEQ',$maxId);



        /**
         * Usuarios Locales
         */
        User::factory(1)->create([
            "username" => "dev",
            "name" => "Developer",
            "password" => bcrypt("admin")
        ])->each(function (User $user){
            $user->syncRoles([Role::DEVELOPER]);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);
        });

        User::factory(1)->create([
            "username" => "Super",
            "name" => "Super Admin",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::SUPERADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);

        });

        User::factory(1)->create([
            "username" => "Admin",
            "name" => "Administrador",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::ADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);

        });

    }

    public function getRole($idPermiso)
    {
        switch ($idPermiso){
            case 1:
                return Role::ADMIN;
                break;
            case 2:
                return Role::ADMIN_CONTRATO;
                break;
            case 3:
                return Role::ADMIN_TÉCNICO;
                break;
            case 4:
                return Role::COMPRADOR;
                break;
            default:
                return null;
        }

    }

    public function getOptions($idPermiso)
    {
        switch ($idPermiso){
            case 1://ADMIN
                return [19,17,18];
                break;
            case 2://ADMIN_CONTRATO
                return [19,17,18];
                break;
            case 3://COMPRADOR
                return [19,17,18];
                break;
            case 4://ADMIN_TÉCNICO
                return [19,17,18];
            case 5://SUB_DIRECTOR
                return [19,17,18];
                break;
            default: // los que no tienen rol o tienen uno mayor a 5
                return [19,17,18];
        }

    }
}


