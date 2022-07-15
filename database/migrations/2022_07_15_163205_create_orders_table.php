<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name', 50);
            $table->string('guest_surname', 50);
            $table->string('guest_phone_number', 10);
            $table->string('guest_email', 50);
            $table->string('guest_city')->default('Milano');
            $table->string('guest_zip_code', 5);
            $table->string('guest_address', 100);
            $table->text('note')->nullable();
            $table->decimal('total_price', 5,2);
            $table->boolean('status')->default(0);
            /* $table->text('id_transaction')->nullable(); */
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
        Schema::dropIfExists('orders');
    }
}
