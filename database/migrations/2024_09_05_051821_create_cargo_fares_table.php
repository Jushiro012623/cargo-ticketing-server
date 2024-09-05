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
        Schema::create('cargo_fares', function (Blueprint $table) {
            $table->id();
            $table->string("weight");
            $table->integer("fare");
            $table->unsignedBigInteger("origin_id")->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger("destination_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_fares');
    }
};
