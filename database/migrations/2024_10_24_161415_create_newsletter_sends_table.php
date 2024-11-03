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
        Schema::create('newsletter_sends', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('newsletter_id')->constrained()->onDelete('cascade');
            $table->foreignId('newsletter_subscriber_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, sent, failed
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            // Optional: Add unique constraint to prevent duplicate sends
            $table->unique(['newsletter_id', 'newsletter_subscriber_id'], 'unique_newsletter_subscriber');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_sends');
    }
};
