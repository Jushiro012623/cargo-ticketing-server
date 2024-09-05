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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id")->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger("payment_method_id")->constrained()->cascadeOnDelete();
            $table->string("status");
            $table->integer("amount");
            $table->integer("total_amount");
            $table->integer("additional_fee");
            $table->string("transaction_code");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
