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

class CreateEshopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('index')->nullable();

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();


            $table->foreign('admin_id')
                ->references('id')
                ->on('eshop_admins');

            $table->foreign('tax_id')
                ->references('id')
                ->on('eshop_taxes');

            // Dataset (Dati utilizzabili fissi)
            $table->string('name');
            $table->longText('info')->nullable();
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
        Schema::dropIfExists('eshop_categories');
    }
}
