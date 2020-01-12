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

class CreateEshopUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshop_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Dataset (Dati utilizzabili fissi)
            $table->string('role')->default('user');
            $table->longText('token')->unique();
            $table->string('email')->unique();
            $table->boolean('enable')->default(true);

            // Dataset (Dati utilizzabili fissi)
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('street1')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fiscal')->nullable();
            $table->string('pec')->nullable();
            $table->string('code')->nullable();

            $table->json('stripe')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('eshop_users');
    }
}
