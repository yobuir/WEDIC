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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->longText('featured_image')->nullable();
            $table->longText('slug')->nullable();
            $table->longText('title')->nullable();
            $table->longText('header')->nullable();
            $table->longText('content')->nullable();
            $table->datetime('date')->nullable();
            $table->text('location')->nullable();
            $table->text('organizer')->nullable();
            $table->text('link')->nullable();
            $table->text('category_id')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('cost')->nullable();
            $table->enum('status', ['draft', 'published', 'archived', 'reviewed'])->default('draft');
            $table->text('deleted_by')->nullable();
            $table->text('updated_by')->nullable();
            $table->text('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
