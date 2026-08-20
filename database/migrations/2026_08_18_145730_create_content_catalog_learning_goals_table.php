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
        Schema::create('content_catalog_learning_goals', function (Blueprint $table) {
            $table->foreignId('content_catalog_id')->constrained('content_catalogs')->cascadeOnDelete();
            $table->foreignId('learning_goal_id')->constrained('learning_goals')->cascadeOnDelete();

            // instead of ->unique(['content_catalog_id', 'learning_goal_id'])
            $table->primary(['content_catalog_id', 'learning_goal_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_catalog_learning_goals');
    }
};
