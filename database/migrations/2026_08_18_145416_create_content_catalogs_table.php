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
        Schema::create('content_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('slug');
            $table->string('short_description');
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('size');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_catalogs');
    }
};
