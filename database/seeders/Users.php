<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => "Admin"
            ],
            [
                'id' => 2,
                'name' => "Client"
            ],
            [
                'id' => 3,
                'name' => "Producteur"
            ]
        ];

        DB::table('roles')->insert(
            $roles
        );

        $users = [
            [
                'id' => 1,
                'name' => 'Jean',
                'email' => 'jean@producteur.com',
                "password" => bcrypt('producteur'),
                'id_role' => 3,
                'banned_until' => true,

            ],
            [
                'id' => 2,
                'name' => 'Henry',
                'email' => 'henry@producteur.com',
                "password" => bcrypt('producteur'),
                'id_role' => 3,
                'banned_until' => false,

            ],
            [
                'id' => 3,
                'name' => 'Matthieu',
                'email' => 'matthieu@producteur.com',
                "password" => bcrypt('producteur'),
                'id_role' => 3,
                'banned_until' => false,

            ],
            [
                'id' => 4,
                'name' => 'Robert',
                'email' => 'robert@producteur.com',
                "password" => bcrypt('producteur'),
                'id_role' => 3,
                'banned_until' => false,

            ],
            [
                'id' => 5,
                'name' => 'George',
                'email' => 'george@client.com',
                "password" => bcrypt('client'),
                'id_role' => 2,
                'banned_until' => false,

            ],
            [
                'id' => 6,
                'name' => 'admin',
                'email' => 'maintenance@admin.com',
                "password" => bcrypt('admin'),
                'id_role' => 1,
                'banned_until' => false,

            ],
        ];

        DB::table('users')->insert(
            $users
        );
    }
}
