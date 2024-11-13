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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id')->constrained()->cascadeOnDelete(); // Foreign key
            $table->unsignedBigInteger('type_id')->constrained()->cascadeOnDelete(); // Foreign key
            $table->unsignedBigInteger('vessel_id')->constrained()->cascadeOnDelete(); // Foreign key
            $table->unsignedBigInteger("fare_id")->constrained()->cascadeOnDelete(); // Foreign key
            $table->unsignedBigInteger("discount_id")->constrained()->cascadeOnDelete(); // Foreign key

            // Ticket attributes
            $table->string('ticket_number')->unique(); // Ensure uniqueness
            $table->bigInteger('voyage_number'); // Consider unique if necessary

            $table->string('status', 105)->default(2)->comment('0 -> Complete, 1 -> Pending, 2 -> InTransit, 3 -> Canceled');
            $table->softDeletes();
            $table->timestamps(); 
        });
        Schema::create('booking_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('booking_types');
    }
};
