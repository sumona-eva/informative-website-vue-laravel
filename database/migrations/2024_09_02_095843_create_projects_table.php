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

            $table->foreignId('project_category_id')
                ->constrained('project_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
            $table->string('cover_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('order_number');
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
