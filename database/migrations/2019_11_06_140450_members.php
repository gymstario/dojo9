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
                $table->integer('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('studio_id')->nullable();
                $table->foreign('studio_id')->references('id')->on('studios');
                $table->string('type')->default('student');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('dob')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('zip')->nullable();
                $table->string('country')->nullable();
                $table->string('rank')->nullable();
                $table->string('ssn')->nullable();
                $table->string('title')->nullable();
                $table->string('email');
                $table->string('phone');
                $table->string('photo')->nullable();
                $table->string('strip_customer_id')->nullable();
                $table->date('enrolment')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('member_dependents')) {
            Schema::create('member_dependents', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('member_id');
                $table->foreign('member_id')->references('id')->on('members');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('dob');
                $table->string('email');
                $table->string('phone');
                $table->date('enrolment');
                $table->timestamps();
                $table->softDeletes();
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
