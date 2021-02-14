<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusLivraisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'id' => 1,
                'status' => "En attente"
            ],
            [
                'id' => 2,
                'status' => "En cours"
            ],
            [
                'id' => 3,
                'status' => "Terminé"
            ],
        ];

        DB::table('status_livraison')->insert(
            $status
        );
    }
}
