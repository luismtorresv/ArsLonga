<?php

/**
 * @author Jeronimo Acosta
 */

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
        Schema::create('auctions', function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
            $table->integer('price_limit');
            $table->foreignId('winning_bidder_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('artwork_id')->constrained('artworks')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};