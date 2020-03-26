<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Diretor',
            'email' => 'diretor@portalescola.com',
            'password' => Hash::make('diretorportal'),
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions')->insert([
            'name' => 'Diretor',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions')->insert([
            'name' => 'Coordenador',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions')->insert([
            'name' => 'Professor',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions')->insert([
            'name' => 'Aluno',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('roles')->insert([
            'name' => 'Diretor',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('roles')->insert([
            'name' => 'Coordenador',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('roles')->insert([
            'name' => 'Professor',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('roles')->insert([
            'name' => 'Aluno',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions_roles')->insert([
            'roles_id' => '1',
            'permissions_id' => '1',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions_roles')->insert([
            'roles_id' => '2',
            'permissions_id' => '2',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions_roles')->insert([
            'roles_id' => '3',
            'permissions_id' => '3',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
        DB::table('permissions_roles')->insert([
            'roles_id' => '4',
            'permissions_id' => '4',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
         DB::table('roles_user')->insert([
            'user_id' => '1',
            'roles_id' => '1',
            'created_at' => now($tz = 'America/Sao_Paulo'),
            'updated_at' => now($tz = 'America/Sao_Paulo')
        ]);
    }
}
