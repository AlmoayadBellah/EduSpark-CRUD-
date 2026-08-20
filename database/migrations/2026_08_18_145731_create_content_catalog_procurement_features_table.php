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
        Schema::create('content_catalog_procurement_features', function (Blueprint $table) {
            $table->foreignId('content_catalog_id')
                ->constrained('content_catalogs')
                ->cascadeOnDelete();

            $table->foreignId('procurement_feature_id')
                ->constrained('procurement_features')
                ->cascadeOnDelete()
                ->name('ccpf_procurement_feature_id_foreign');
                $table->primary([
                'content_catalog_id',
                'procurement_feature_id'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_catalog_procurement_features');
    }
};
