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
        Schema::create('fares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("route_id")->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger("type_id")->nullable();
            $table->string("fare");
            // $table->unsignedBigInteger("discount_id")->constrained()->cascadeOnDelete(); // Foreign key
            // $table->string("student")->nullable();
            // $table->string("pwd_senior")->nullable();
            // $table->string("half_fare")->nullable();
            // $table->string("minor")->nullable();
            $table->string("length")->nullable();
            $table->string("additional_fee")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fares');
    }
};
