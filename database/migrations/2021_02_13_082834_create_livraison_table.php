<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
            $table->bigInteger('id_commande')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->bigInteger('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status_livraison');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('livraisons');
        Schema::enableForeignKeyConstraints();
    }
}
