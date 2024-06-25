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
                $table->string('nom');
                $table->string('prenom');
                $table->string('date_naissance');
                $table->string('numero_reseau');
                $table->string('numwhats');
                $table->string('email')->unique();
                $table->string('pseudo')->unique();
                $table->string('password');
                $table->string('region');
                $table->string('ville');
                $table->string('inscription_1')->default(0);
                $table->string('perte_info')->default(0);
                $table->string('reseau1')->nullable();
                $table->string('reseau2')->nullable();
                $table->string('info_exact')->default(0);
                $table->string('accept_condition')->default(0);
                $table->string('commune');
                $table->string('quartier');
                $table->string('referral_code')->unique();
                $table->decimal('daily_percent',10,2)->default(0);
                $table->string('invitant')->nullable(); 
                $table->decimal('balance', 10, 2)->default(0); 
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
