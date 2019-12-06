<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEshopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->bigInteger('pos_id')->nullable();

            $table->json('payload')->nullable();

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
        Schema::dropIfExists('products');
    }
}
