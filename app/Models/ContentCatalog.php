<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCatalog extends Model
{

use HasFactory, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'status',
        'slug',
        'short_description',
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
    return $this->belongsToMany(LearningGoal::class);
}

  public function procurementFeatures()
{
    return $this->belongsToMany(ProcurementFeature::class);
}


public function Language()
{
    return $this->belongsTo(Language::class);
}

}