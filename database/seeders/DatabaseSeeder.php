<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Users::class,
            Products::class,
            Exploitations::class,
            Fiches::class,
            StatusLivraisonSeeder::class
        ]);
    }
}
