<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('stores')) {
            Schema::create('stores', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('member_id');
                $table->string('name');
                $table->string('phone');
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->string('zip');
                $table->string('country');
                $table->string('tax_id');
                $table->string('mcc');
                $table->string('url');
                $table->longText('description');
                $table->dateTime('date');
                $table->string('ip');
                $table->string('strip_customer_id');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('stores', function (Blueprint $table) {
              //  $table->foreign('member_id')->references('id')->on('members'); // hasmnany
            });
        }

        if (!Schema::hasTable('branches')) {
            Schema::create('branches', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('store_id');
                $table->string('name');
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('zip')->nullable();
                $table->string('country')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('branches', function (Blueprint $table) {
              //  $table->foreign('store_id')->references('id')->on('stores'); // hasmany
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
        Schema::dropIfExists('stores');
    }
}
