<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformInfo extends Model
{
    protected $fillable = [
        'editor_lead',
        'platform_type',
        'platform_usp',
        'available_performance_metrics',
        'subscription_type',
        'subscribers',
        'political_affiliation',
        'recent_changes_in_management_ownership',
        'contact_person_for_unilever',
        'primary_audience_demographics',
        'ad_format_availability',
        'historical_performance_highlights',
        'platform_reach_geography',
        'notes_remarks',
    ];
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
