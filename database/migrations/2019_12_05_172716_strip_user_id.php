<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StripUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function ($table) {
            $table->string('strip_customer_id')->after('password')
                ->nullable()
                ->default(null);
        });

        Schema::table('plans', function ($table) {
            $table->string('role')->after('stripe_id')->default('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function ($table) {
            $table->dropColumn('strip_customer_id');
        });

        Schema::table('plans', function ($table) {
            $table->dropColumn('role');
        });
    }
}
