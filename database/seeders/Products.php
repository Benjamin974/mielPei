<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'produit 1',
                'image' => '/storage/images/miel_1.jpg',
                'id_user' => 1,
                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 2,
                'name' => 'produit 2',
                'image' => '/storage/images/miel_2.jpg',
                'id_user' => 1,
                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 3,
                'name' => 'produit 3',
                'image' => '/storage/images/miel_3.jpeg',
                'id_user' => 2,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 4,
                'name' => 'produit 4',
                'image' => '/storage/images/miel_4.jpg',
                'id_user' => 2,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 5,
                'name' => 'produit 5',
                'image' => '/storage/images/miel_5.jpeg',
                'id_user' => 3,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 6,
                'name' => 'produit 6',
                'image' => '/storage/images/miel_4.jpg',
                'id_user' => 3,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 7,
                'name' => 'produit 7',
                'image' => '/storage/images/miel_5.jpeg',
                'id_user' => 4,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 8,
                'name' => 'produit 8',
                'image' => '/storage/images/miel_4.jpg',
                'id_user' => 4,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 9,
                'name' => 'produit 9',
                'image' => '/storage/images/miel_5.jpeg',
                'id_user' => 1,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 10,
                'name' => 'produit 10',
                'image' => '/storage/images/miel_4.jpg',
                'id_user' => 2,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 11,
                'name' => 'produit 11',
                'image' => '/storage/images/miel_5.jpeg',
                'id_user' => 3,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 12,
                'name' => 'produit 12',
                'image' => '/storage/images/miel_4.jpg',
                'id_user' => 4,

                'quantite' => 10,
                'prix' => 10,
            ],
            [
                'id' => 13,
                'name' => 'produit 13',
                'image' => '/storage/images/miel_5.jpeg',
                'id_user' => 1,
                'quantite' => 10,
                'prix' => 10,
            ],
        ];
        DB::table('products')->insert(
            $products
        );
    }
}
