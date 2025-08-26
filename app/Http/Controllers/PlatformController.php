<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    // Show form to add new platform data
    public function create()
    {
        $platforms = Platform::get();

        return view('platforms.create', compact('platforms'));
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'platform_name' => 'required|string|max:255',
        ]);

        Platform::create($request->all());

        return redirect()->back()->with('success', 'Platform data saved successfully!');
    }

    // Show platform info page
    public function show($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platforms.show', compact('platform'));
    }

    // Page with dropdown to select a platform
    public function select()
    {
        $platforms = Platform::all();
        return view('platforms.select', compact('platforms'));
    }
    public function destroy(Platform $platform)
    {
        $platform->delete();
        return back()->with('success', 'Platform deleted successfully!');
    }
}
