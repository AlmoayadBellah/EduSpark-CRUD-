<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ContentCatalog extends Model
{

    use HasFactory;

   protected $table = 'content_catalogs';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
      
        'short_description',
        'status',
        'slug',
        'language_id',
        'size',
        'cost',
    ];

    protected $casts = [
        'size' => 'integer',
        'cost' => 'decimal:2',
    ];

    public function learningGoals()
    {
        return $this->belongsToMany(
            LearningGoal::class,
            'content_catalog_learning_goals'
            
        );
    }

    public function procurementFeatures()
    {
        return $this->belongsToMany(
            ProcurementFeature::class,
            'content_catalog_procurement_features',
            'content_catalog_id',
            'procurement_feature_id'
        );
    }


    public function Language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
