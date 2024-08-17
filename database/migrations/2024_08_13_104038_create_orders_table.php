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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('location');
            $table->string('destination');
            $table->integer('no_of_trucks');
            $table->string('type_of_truck')->nullable();
            $table->string('company_name')->nullable();
            $table->string('cargo_type');
            $table->string('cargo_weight')->nullable();
            $table->dateTime('pickup_time');
            $table->dateTime('delivery_time');
            $table->enum('status', ['pending', 'in progress', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
