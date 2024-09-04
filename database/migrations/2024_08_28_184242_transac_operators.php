<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
      /*  Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('commissions', 15, 2)->default(0);
            $table->string('identifiant');
            $table->string('location');
            $table->enum('status', ['active', 'suspended', 'inactive'])->default('inactive');

            $table->timestamps();
        });
        Schema::create('operators_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained('operators')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('interaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('notes')->nullable();
            $table->foreignId('transaction_id')->constrained('transac_operators')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('transac_operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained('operators')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('operators_clients')->onDelete('cascade');
            $table->string('identifiant');
            $table->decimal('sommes', 15, 2);
            $table->decimal('frais', 15, 2)->default(0);
            $table->timestamps();
        });*/
     /* DROP TABLE IF EXISTS operators_clients;
DROP TABLE IF EXISTS transac_operators;
DROP TABLE IF EXISTS operators;

CREATE TABLE operators (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    balance DECIMAL(15, 2) DEFAULT 0,
    commissions DECIMAL(15, 2) DEFAULT 0,
    identifiant VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    status ENUM('active', 'suspended', 'inactive') DEFAULT 'inactive',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE operators_clients (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    operator_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NOT NULL,
    interaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (operator_id) REFERENCES operators(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    
);
CREATE TABLE caisses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    balance DECIMAL(15, 2) DEFAULT 0.00,
    description TEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE transac_operators (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    operator_id BIGINT UNSIGNED NOT NULL,
    client_id BIGINT UNSIGNED NOT NULL,
    identifiant VARCHAR(255) NOT NULL,
    sommes DECIMAL(15, 2) NOT NULL,
    frais DECIMAL(15, 2) DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (operator_id) REFERENCES operators(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES operators_clients(id) ON DELETE CASCADE
);

        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('transac_operators');
    }
};
