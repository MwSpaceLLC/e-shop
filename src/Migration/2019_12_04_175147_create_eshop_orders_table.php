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

class CreateEshopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();

            $table->foreign('service_id')
                ->references('id')
                ->on('eshop_services');

            $table->foreign('cart_id')
                ->references('id')
                ->on('eshop_carts');

            $table->foreign('admin_id')
                ->references('id')
                ->on('eshop_admins');

            $table->foreign('user_id')
                ->references('id')
                ->on('eshop_users')->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('eshop_products');

            $table->foreign('payment_id')
                ->references('id')
                ->on('eshop_payments');

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
        Schema::dropIfExists('eshop_orders');
    }
}
