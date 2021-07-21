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

            $username = (strstr($user->mail, '@', true) . "\n");

            User::create([
                'id' => $user->id_usuario,
                'username' => $username,
                'name' => $user->nombre,
                'email' => $user->mail,
                'password' => bcrypt("123"),
                'area_id' => $user->id_area,
                'cargo_id' => $user->id_cargo,
            ]);
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
}
