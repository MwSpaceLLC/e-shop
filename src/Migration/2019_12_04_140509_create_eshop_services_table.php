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

class CreateEshopServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('index')->nullable();

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('admin_id')
                ->references('id')
                ->on('eshop_admins');

            $table->foreign('category_id')
                ->references('id')
                ->on('eshop_categories')->onDelete('cascade');

            // Dataset (Dati utilizzabili fissi)
            $table->string('name');
            $table->decimal('price');
            $table->longText('info')->nullable();
            $table->string('interval')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('enable')->default(true);
            $table->string('role')->default('public');

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
        Schema::dropIfExists('eshop_services');
    }
}
