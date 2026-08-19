<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentCatalogController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LearningGoalController;
use App\Http\Controllers\ProcurementFeatureController;

Route::get('/', function () {
    return redirect()->route('content-catalogs.index');
});

Route::resource('content-catalogs', ContentCatalogController::class);

Route::resource('languages', LanguageController::class);

Route::resource('learning-goals', LearningGoalController::class);

Route::resource('procurement-features', ProcurementFeatureController::class);