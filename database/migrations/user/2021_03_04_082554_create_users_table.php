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
            $table->bigIncrements('id')->unsigned();
            $table->string('Fname');
            $table->string('Lname');
            $table->biginteger('MobileNo')->unique();
            $table->string('email')->unique();
            $table->string('pwd');
            $table->date('dob');
            $table->string('Gender');
            $table->string('State');
            $table->string('City');
            $table->longtext('Address');     
            $table->biginteger('pincode');
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
