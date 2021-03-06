<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('subscriptions')) {
            Schema::create('subscriptions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('stripe_subscription_id');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('subscriptions', function (Blueprint $table) {
                ///  $table->foreign('user_id')->references('id')->on('users'); // hasMany
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
        Schema::dropIfExists('subscriptions');
    }
}
