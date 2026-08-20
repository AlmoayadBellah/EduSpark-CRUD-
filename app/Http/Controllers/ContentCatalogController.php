<?php

namespace App\Http\Controllers;

use App\Models\ContentCatalog;
use App\Models\Language;
use App\Models\LearningGoal;
use App\Models\ProcurementFeature;
use Illuminate\Http\Request;

class ContentCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contentCatalogs = ContentCatalog::with([
            'language',
            'learningGoals',
            'procurementFeatures'
        ])->get();

        return view('content-catalogs.index', compact('contentCatalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $language = Language::all();
        $learningGoals = LearningGoal::all();
        $procurementFeatures = ProcurementFeature::all();

        return view('content-catalogs.create', compact(
            'language',
            'learningGoals',
            'procurementFeatures'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
            ],

            'cost' => [
                'required',
                'numeric',
                'min:0',
            ],

            'size' => [
                'required',
                'integer',
                'min:0',
            ],

            'language_id' => [
                'required',
                'exists:languages,id',
            ],

            'learning_goals' => [
                'nullable',
                'array',
            ],

            'learning_goals.*' => [  'required',
                'exists:learning_goals,id',
            ],

            'procurement_features' => [
                'nullable',
                'array',
            ],

            'procurement_features.*' => [
                'exists:procurement_features,id',
            ],
        ]);

        $contentCatalog = ContentCatalog::create([
            'short_description' => $validated['description'],
            'status' => 'enabled',
            'slug' => $validated['slug'],
            'language_id' => $validated['language_id'],
            'size' => $validated['size'],
            'cost' => $validated['cost'],
        ]);

        
        $contentCatalog->learningGoals()->sync(
            $validated['learning_goals'] ?? []
        );

        $contentCatalog->procurementFeatures()->sync(
            $validated['procurement_features'] ?? []
        );

        return redirect()
            ->route('content-catalogs.index')
            ->with(
                'success',
                'Content Catalog created successfully.'
            );
    }
          /*  $contentCatalog = ContentCatalog::create([

            'title' => $validated['title'],
            'short_description' => $validated['description'] ?? null,
            'status'=> 'enabled',
            'slug'=> $validated['slug'] ?? null,
            'language_id'=> $validated['language_id'] ,
            'size' => $validated['size'] ,
            'cost'=> $validated['cost']
        ]);

        // Many-to-Many relationships
        $contentCatalog->language()->sync(
            $validated['language']
        );

        $contentCatalog->learningGoals()->sync(
            $validated['learning_goals'] ?? []
        );

        $contentCatalog->procurementFeatures()->sync(
            $validated['procurement_features'] ?? []
        );

        return redirect()
            ->route('content-catalogs.index')
            ->with('success', 'Content Catalog created successfully.');
    }
            */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contentCatalog = ContentCatalog::with([
            'language',
            'learningGoals',
            'procurementFeatures'
        ])->findOrFail($id);

        return view('content-catalogs.show', compact('contentCatalog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contentCatalog = ContentCatalog::with([
            'language',
            'learningGoals',
            'procurementFeatures'
        ])->findOrFail($id);

        $languages = Language::all();
        $learningGoals = LearningGoal::all();
        $procurementFeatures = ProcurementFeature::all();

        return view('content-catalogs.edit', compact(
            'contentCatalog',
            'languages',
            'learningGoals',
            'procurementFeatures'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contentCatalog = ContentCatalog::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'language_id' => ['required'],

            'learning_goals' => ['nullable', 'array'],
            'learning_goals.*' => ['exists:learning_goals,id'],

            'procurement_features' => ['nullable', 'array'],
            'procurement_features.*' => ['exists:procurement_features,id'],
        ]);

        $contentCatalog->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        // Update pivot tables
        $contentCatalog->learningGoals()->sync(
            $validated['learning_goals'] ?? []
        );

        $contentCatalog->procurementFeatures()->sync(
            $validated['procurement_features'] ?? []
        );

        return redirect()
            ->route('content-catalogs.index')
            ->with('success', 'Content Catalog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contentCatalog = ContentCatalog::findOrFail($id);

        $contentCatalog->language();
        $contentCatalog->learningGoals()->detach();
        $contentCatalog->procurementFeatures()->detach();

        $contentCatalog->delete();

        return redirect()
            ->route('content-catalogs.index')
            ->with('success', 'Content Catalog deleted successfully.');
    }
}
