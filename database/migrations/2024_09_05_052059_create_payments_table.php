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
            $table->id(); // Primary key
            $table->unsignedBigInteger("ticket_id")->constrained()->cascadeOnDelete(); // Foreign key
            $table->unsignedBigInteger("payment_method_id")->constrained()->cascadeOnDelete(); 

            // Payment details
            $table->decimal("amount", 10, 2); 
            $table->decimal("total_amount", 10, 2);
            $table->decimal("additional_fee", 10, 2);
            $table->string("transaction_code");

            $table->string('payment_status', 105)->default(2)->comment('0 -> Paid, 1 -> Pending, 2 -> Failed');
        
            // Payment date
            $table->dateTime("payment_date")->nullable();
        
            $table->softDeletes();
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
