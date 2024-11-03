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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->longText('featured_image');
            $table->longText('slug');
            $table->longText('title');
            $table->longText('header');
            $table->longText('content');
            $table->string('budget')->nullable();
            $table->string('currency')->nullable();
            $table->text('partners')->nullable();
            $table->text('coordinator')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('location')->nullable();
            $table->text('category_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
