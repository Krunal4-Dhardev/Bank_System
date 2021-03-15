<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('id_user');
            $table->biginteger('Account_no')->unique();
            $table->biginteger('PIN')->unique();
            $table->string('Pan_Card')->unique();
            $table->string('Aadhar_Card')->unique();
            $table->biginteger('Income');
            $table->string('Occupation');
            $table->string('Account_type'); 
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
        Schema::dropIfExists('accounts');
    }
}
