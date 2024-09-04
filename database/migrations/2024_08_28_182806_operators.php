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
        //
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('commissions', 15, 2)->default(0);
            $table->string('identifiant');
            $table->string('location');
            $table->enum('status', ['active', 'suspended', 'inactive'])->default('inactive');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        
        Schema::dropIfExists('operators');
    }
};
