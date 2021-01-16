<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fiches extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fiches = [
            [
                'profession' => 'producteur nord',
                'content' => 'Peu nombreux sont les apiculteurs qui s’engagent en bio pour des
                raisons économiques, l’écart de valorisation entre du miel bio et
                non bio étant relativement contenu, excepté pour certains modes
                de distribution. Des références économiques (FNAB, 2017) existent
                et donnent un aperçu du marché des produits biologiques.',
                'id_user' => 1,
            ],
            [
                'profession' => 'producteur sud',
                'content' => 'Peu nombreux sont les apiculteurs qui s’engagent en bio pour des
                raisons économiques, l’écart de valorisation entre du miel bio et
                non bio étant relativement contenu, excepté pour certains modes
                de distribution. Des références économiques (FNAB, 2017) existent
                et donnent un aperçu du marché des produits biologiques.',
                'id_user' => 2,
            ],
            [
                'profession' => 'producteur est',
                'content' => 'Peu nombreux sont les apiculteurs qui s’engagent en bio pour des
                raisons économiques, l’écart de valorisation entre du miel bio et
                non bio étant relativement contenu, excepté pour certains modes
                de distribution. Des références économiques (FNAB, 2017) existent
                et donnent un aperçu du marché des produits biologiques.',
                'id_user' => 3,
            ],
            [
                'profession' => 'producteur ouest',
                'content' => 'Peu nombreux sont les apiculteurs qui s’engagent en bio pour des
                raisons économiques, l’écart de valorisation entre du miel bio et
                non bio étant relativement contenu, excepté pour certains modes
                de distribution. Des références économiques (FNAB, 2017) existent
                et donnent un aperçu du marché des produits biologiques.',
                'id_user' => 4,
            ]
        ];
        DB::table('fiches')->insert(
            $fiches
        );
    }
}
