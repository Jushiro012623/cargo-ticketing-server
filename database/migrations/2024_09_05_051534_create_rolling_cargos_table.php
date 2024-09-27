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
        Schema::create('rolling_cargos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id")->constrained()->cascadeOnDelete();
            $table->string("vehicle_type");
            $table->string("plate_number");
            $table->unsignedBigInteger("route_id")->constrained()->cascadeOnDelete();
            $table->string("weight");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rolling_cargos');
    }
};
