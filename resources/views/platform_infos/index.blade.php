@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <h3>Platform Info</h3>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    {{-- Filter by Platform --}}
    <form method="GET" action="{{ route('platform-info.index') }}" class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="platform_id" class="form-label">Select Platform</label>
            <select name="platform_id" id="platform_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- Select Platform --</option>
                @foreach($platforms as $p)
                    <option value="{{ $p->id }}" {{ (string)$selectedPlatformId === (string)$p->id ? 'selected' : '' }}>
                        {{ $p->platform_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <a href="{{ route('platform-info.create') }}" class="btn btn-primary ms-auto">Add / Update Info</a>
        </div>
    </form>

    {{-- Results --}}
    <div class="mt-4">
        @if($selectedPlatformId && $selectedPlatform)
            <div class="card">
                <div class="card-header">
                    <strong>{{ $selectedPlatform->platform_name }}</strong>
                </div>
                <div class="card-body p-0">
                    @if($info)
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr><th style="width: 320px;">Editor/Lead</th><td>{{ $info->editor_lead }}</td></tr>
                                <tr><th>Platform Type</th><td>{{ $info->platform_type }}</td></tr>
                                <tr><th>Platform USP</th><td>{{ $info->platform_usp }}</td></tr>
                                <tr><th>Available Performance Metrics</th><td>{{ $info->available_performance_metrics }}</td></tr>
                                <tr><th>Subscription Type</th><td>{{ $info->subscription_type }}</td></tr>
                                <tr><th>Subscribers</th><td>{{ $info->subscribers }}</td></tr>
                                <tr><th>Political Affiliation</th><td>{{ $info->political_affiliation }}</td></tr>
                                <tr><th>Recent Changes in Management/Ownership</th><td>{{ $info->recent_changes_in_management_ownership }}</td></tr>
                                <tr><th>Contact Person for Unilever</th><td>{{ $info->contact_person_for_unilever }}</td></tr>
                                <tr><th>Primary Audience Demographics</th><td>{{ $info->primary_audience_demographics }}</td></tr>
                                <tr><th>Ad Format Availability</th><td>{{ $info->ad_format_availability }}</td></tr>
                                <tr><th>Historical Performance Highlights</th><td>{{ $info->historical_performance_highlights }}</td></tr>
                                <tr><th>Platform Reach Geography</th><td>{{ $info->platform_reach_geography }}</td></tr>
                                <tr><th>Notes/Remarks</th><td>{{ $info->notes_remarks }}</td></tr>
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning m-3">
                            No info saved for <strong>{{ $selectedPlatform->platform_name }}</strong> yet.
                            <a class="ms-2" href="{{ route('platform-info.create') }}">Add now</a>.
                        </div>
                    @endif
                </div>
            </div>
        @elseif($selectedPlatformId && !$selectedPlatform)
            <div class="alert alert-danger mt-3">Selected platform not found.</div>
        @else
            <div class="alert alert-info mt-3">Select a platform to view its information.</div>
        @endif
    </div>
</div>
@endsection
