<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("car_id");
            $table->foreign("car_id")->references("id")->on("cars");
            $table->unsignedBigInteger("driver_id");
            $table->foreign("driver_id")->references("id")->on("drivers");
            $table->datetime("order_date");
            $table->string("payment_method");
            $table->string("order_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(["user_id"]);
            $table->dropForeign(["car_id"]);
            $table->dropForeign(["driver_id"]);
        });
        Schema::dropIfExists('orders');
    }
};
