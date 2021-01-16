<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesHasProductsTable extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures_has_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_facture')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->foreign('id_facture')->references('id')->on('factures');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('factures_has_products');
        Schema::enableForeignKeyConstraints();

    }
}
