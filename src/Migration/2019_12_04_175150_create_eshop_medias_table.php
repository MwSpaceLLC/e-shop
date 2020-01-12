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

class CreateEshopMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_medias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('index')->nullable();

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('eshop_users')->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('eshop_categories')->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('eshop_products')->onDelete('cascade');

            $table->foreign('service_id')
                ->references('id')
                ->on('eshop_services')->onDelete('cascade');

            $table->foreign('admin_id')
                ->references('id')
                ->on('eshop_admins');

            // Dataset (Dati utilizzabili fissi)
            $table->string('name')->nullable();
            $table->string('path');
            $table->string('type')->default('image');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eshop_medias');
    }
}
