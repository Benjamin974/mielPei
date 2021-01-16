<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes_has_products', function (Blueprint $table) {
            $table->id();
            $table->string('quantite')->nullable();
            $table->bigInteger('id_commande')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->foreign('id_product')->references('id')->on('products');
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
        Schema::dropIfExists('commandes_has_products');
    }
}
