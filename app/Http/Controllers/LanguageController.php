<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $languages = Language::all();

        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
            'code' => ['required', 'string', 'max:10', 'unique:languages,code'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        Language::create($validated);

        return redirect()
            ->route('languages.index')
            ->with('success', 'Language created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $language = Language::findOrFail($id);

        return view('languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $language = Language::findOrFail($id);

        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $language = Language::findOrFail($id);
         $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'max:10',
                'unique:languages,code,' . $language->id,
            ],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $language->update($validated);

        return redirect()
            ->route('languages.index')
            ->with('success', 'Language updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $language = Language::findOrFail($id);

        $language->delete();

        return redirect()
            ->route('languages.index')
            ->with('success', 'Language deleted successfully.');
    }
    }

