<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\PlatformInfo;
use Illuminate\Http\Request;

class PlatformInfoController extends Controller
{
    /**
     * Show index: dropdown to pick a Platform and display its info table.
     */
    public function index(Request $request)
    {
        $platforms = Platform::orderBy('platform_name')->get(['id', 'platform_name']);
        
        // Get distinct platform types for filter dropdown
        $platformTypes = PlatformInfo::whereNotNull('platform_type')
            ->where('platform_type', '!=', '')
            ->distinct()
            ->orderBy('platform_type')
            ->pluck('platform_type');

        $selectedPlatformId = $request->query('platform_id');
        $selectedPlatformType = $request->query('platform_type');
        
        $selectedPlatform = null;
        $info = null;
        $filteredPlatforms = collect();

        // If platform type filter is selected, get platforms with that type
        if ($selectedPlatformType && !$selectedPlatformId) {
            $filteredPlatforms = Platform::whereHas('info', function($query) use ($selectedPlatformType) {
                $query->where('platform_type', $selectedPlatformType);
            })->with('info')->orderBy('platform_name')->get();
        }
        // If specific platform is selected
        elseif ($selectedPlatformId) {
            $selectedPlatform = Platform::with('info')->find($selectedPlatformId);
            $info = optional($selectedPlatform)->info;
        }

        return view('platform_infos.index', compact(
            'platforms', 
            'platformTypes',
            'selectedPlatformId', 
            'selectedPlatformType',
            'selectedPlatform', 
            'info',
            'filteredPlatforms'
        ));
    }

    /**
     * Show create form: dropdown to pick a Platform + form with all info fields.
     */
    public function create()
    {
        $platforms = Platform::orderBy('platform_name')->get(['id', 'platform_name']);
        return view('platform_infos.create', compact('platforms'));
    }

    /**
     * Store or update (1:1) PlatformInfo for a Platform.
     * Uses updateOrCreate to keep it idempotent per platform_id.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'platform_id' => ['required', 'exists:platforms,id'],
            'editor_lead' => ['nullable', 'string', 'max:255'],
            'platform_type' => ['nullable', 'string', 'max:255'],
            'platform_usp' => ['nullable', 'string'],
            'available_performance_metrics' => ['nullable', 'string'],
            'subscription_type' => ['nullable', 'string', 'max:255'],
            'subscribers' => ['nullable', 'string', 'max:255'],
            'political_affiliation' => ['nullable', 'string', 'max:255'],
            'recent_changes_in_management_ownership' => ['nullable', 'string'],
            'contact_person_for_unilever' => ['nullable', 'string', 'max:255'],
            'primary_audience_demographics' => ['nullable', 'string'],
            'ad_format_availability' => ['nullable', 'string'],
            'historical_performance_highlights' => ['nullable', 'string'],
            'platform_reach_geography' => ['nullable', 'string'],
            'notes_remarks' => ['nullable', 'string'],
        ]);
        
        
       // Find existing by platform_id or instantiate a new one (keeps 1:1)
        $info = PlatformInfo::firstOrNew(['platform_id' => $data['platform_id']]);

        $info->platform_id = $data['platform_id'];
        $info->editor_lead = $data['editor_lead'] ?? null;
        $info->platform_type = $data['platform_type'] ?? null;
        $info->platform_usp = $data['platform_usp'] ?? null;
        $info->available_performance_metrics = $data['available_performance_metrics'] ?? null;
        $info->subscription_type = $data['subscription_type'] ?? null;
        $info->subscribers = $data['subscribers'] ?? null;
        $info->political_affiliation = $data['political_affiliation'] ?? null;
        $info->recent_changes_in_management_ownership = $data['recent_changes_in_management_ownership'] ?? null;
        $info->contact_person_for_unilever = $data['contact_person_for_unilever'] ?? null;
        $info->primary_audience_demographics = $data['primary_audience_demographics'] ?? null;
        $info->ad_format_availability = $data['ad_format_availability'] ?? null;
        $info->historical_performance_highlights = $data['historical_performance_highlights'] ?? null;
        $info->platform_reach_geography = $data['platform_reach_geography'] ?? null;
        $info->notes_remarks = $data['notes_remarks'] ?? null;

        $info->save();
        
        return redirect()
            ->route('platform-info.index', ['platform_id' => $data['platform_id']])
            ->with('success', 'Platform info saved successfully.');
    }

    /**
     * Show edit form for a specific platform's info
     */
    public function edit(Platform $platform)
    {
        $platforms = Platform::orderBy('platform_name')->get(['id', 'platform_name']);
        $info = $platform->info; // Get existing info if it exists
        
        return view('platform_infos.edit', compact('platforms', 'platform', 'info'));
    }

    /**
     * Update the platform info
     */
    public function update(Request $request, Platform $platform)
    {
        $data = $request->validate([
            'editor_lead' => ['nullable', 'string', 'max:255'],
            'platform_type' => ['nullable', 'string', 'max:255'],
            'platform_usp' => ['nullable', 'string'],
            'available_performance_metrics' => ['nullable', 'string'],
            'subscription_type' => ['nullable', 'string', 'max:255'],
            'subscribers' => ['nullable', 'string', 'max:255'],
            'political_affiliation' => ['nullable', 'string', 'max:255'],
            'recent_changes_in_management_ownership' => ['nullable', 'string'],
            'contact_person_for_unilever' => ['nullable', 'string', 'max:255'],
            'primary_audience_demographics' => ['nullable', 'string'],
            'ad_format_availability' => ['nullable', 'string'],
            'historical_performance_highlights' => ['nullable', 'string'],
            'platform_reach_geography' => ['nullable', 'string'],
            'notes_remarks' => ['nullable', 'string'],
        ]);

        // Find existing info or create new one
        $info = PlatformInfo::firstOrNew(['platform_id' => $platform->id]);
        
        // Update all fields
        $info->fill($data);
        $info->platform_id = $platform->id;
        $info->save();

        return redirect()
            ->route('platform-info.index', ['platform_id' => $platform->id])
            ->with('success', 'Platform info updated successfully.');
    }
}