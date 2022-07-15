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
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('telephone_number', 10);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('business_name', 50)->unique();
            $table->string('slug');
            $table->string('cover_img');
            $table->string('city')->default('Milano');
            $table->string('zip_code'); // VICINO INTEGER NON VANNO I NUMERI
            $table->string('address', 100);
            $table->string('vat_number');
            $table->timestamp('email_verified_at')->nullable();
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
