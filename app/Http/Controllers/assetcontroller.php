<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
class assetcontroller extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact( 'assets'));
    }
    public function show(Asset $asset)
    {
        return view('asset.show', compact('asset'));
    }
    public function create()
    {
        return view('asset.create');
    }
    public function store(Request $request)
    {
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'win_percentage' => 'numeric|min:0|max:100',
        'wintimes' => 'numeric',
        'favorite_indicator' => 'nullable|string|max:255',
        'study_objective' => 'nullable|string|max:255',
    ]);

    // Create the new asset
    Asset::create($validated);

    // Redirect back to asset index or show success message
    return redirect()->route('asset.index')->with('success', 'Asset created successfully!');
    }


// Edit page
    public function edit(Asset $asset)
    {
    return view('asset.edit', compact('asset'));
    }

// Update the asset
    public function update(Request $request, Asset $asset)
    {
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        // 'win_percentage' => 'numeric|min:0|max:100',
        'favorite_indicator' => 'nullable|string|max:255',
        'study_objective' => 'nullable|string|max:255',
    ]);

    // Update the asset
    $asset->update($validated);

    // Redirect to the asset index page
    return redirect()->route('asset.index')->with('success', 'Asset updated successfully!');
    }

    public function destroy(Asset $asset)
    {
        // Delete the asset from the database
        $asset->delete();
    
        // Redirect to the asset index page
        return redirect()->route('asset.index')->with('success', 'Asset deleted successfully!');
    }
}
