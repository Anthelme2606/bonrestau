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
        Schema::create('users', function (Blueprint $table) {
              $table->id();
                $table->string('name');
                $table->string('phone');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('referral_code')->unique();//code de parrainage
                $table->decimal('daily_percent',10,2)->default(0);
                $table->string('referrer_code')->nullable(); // Référence au parrain
                $table->decimal('balance', 10, 2)->default(0); // Solde initial
                $table->enum('user_type', ['admin', 'client'])->default('client');
                $table->rememberToken();
                $table->timestamps();
                $table->timestamp('daily_percent_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
