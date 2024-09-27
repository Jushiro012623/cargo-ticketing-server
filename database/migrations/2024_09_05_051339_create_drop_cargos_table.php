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
        Schema::create('drop_cargos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id")->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger("route_id")->constrained()->cascadeOnDelete();
            $table->text("cargo_description");
            $table->string("weight");
            $table->string("item_name");
            $table->string("quantity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_cargos');
    }
};
