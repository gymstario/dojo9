<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Classes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('classes')) {
            Schema::create('classes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('studio_id');
                $table->integer('branch_id');
                $table->string('stripe_product_id')->nullable();
                $table->string('name');
                $table->time('start');
                $table->time('end');
                $table->string('days')->comment('Days of the week like mo,tu,we,th,fr,sa,su');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('classes', function (Blueprint $table) {
                // $table->foreign('branch_id')->references('id')->on('branches'); // hasMany
            });
        }

        if (!Schema::hasTable('class_members')) {
            Schema::create('class_members', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('class_id');
                $table->time('member_id');
                $table->date('joining');
                $table->string('days')->comment('Days of the week like mo,tu,we,th,fr,sa,su');
                $table->string('type')->default('student')->comment('Redundant');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('class_members', function (Blueprint $table) {
                //  $table->foreign('class_id')->references('id')->on('classes'); // hasMany
                // $table->foreign('member_id')->references('id')->on('members'); // hasMany
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
        Schema::dropIfExists('classes');
    }
}
