<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('code_adherent')->nullable();
            $table->string('firstname')->default('first');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('cin')->nullable();
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();

            $table->date('birth_date')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('code_commession')->nullable();

            $table->foreignId('structer_id')->nullable();  
            $table->string('observation')->nullable();
            $table->date('joinning_date')->nullable();
            $table->string('type_adherent')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
