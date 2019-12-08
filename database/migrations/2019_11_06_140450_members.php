<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Members extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('members')) {
            Schema::create('members', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('type')->default('student');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('dob');
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->string('zip');
                $table->string('country');
                $table->string('ssn_last_4')->nullable();
                $table->string('title')->nullable();
                $table->string('email');
                $table->string('phone');
                $table->string('strip_customer_id')->nullable();
                $table->date('enrolment')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('members', function (Blueprint $table) {
                //  $table->foreign('user_id')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('member_dependents')) {
            Schema::create('member_dependents', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('member_id');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('dob');
                $table->string('email');
                $table->string('phone');
                $table->date('enrolment');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('member_dependents', function (Blueprint $table) {
                //  $table->foreign('member_id')->references('id')->on('members'); // hasMany
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
        Schema::dropIfExists('member_dependents');
        Schema::dropIfExists('members');
    }
}
