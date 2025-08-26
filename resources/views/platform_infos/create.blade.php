@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <h3>Add / Update Platform Info</h3>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('platform-info.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="row">
            {{-- Platform selector --}}
<div class="col-md-6 mb-3">
    <label for="platform_id" class="form-label">Platform</label>
    <select
        name="platform_id"
        id="platform_id"
        class="form-select @error('platform_id') is-invalid @enderror"
        required
    >
        <option value="">-- Select Platform --</option>
        @foreach($platforms as $p)
            <option
                value="{{ $p->id }}"
                @selected(old('platform_id', request('platform_id')) == $p->id)
            >
                {{ $p->platform_name }}
            </option>
        @endforeach
    </select>
    @error('platform_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


            {{-- Editor/Lead --}}
            <div class="col-md-6 mb-3">
                <label for="editor_lead" class="form-label">Editor/Lead</label>
                <input type="text" name="editor_lead" id="editor_lead" class="form-control"
                       value="{{ old('editor_lead') }}">
            </div>

            {{-- Platform Type --}}
            <div class="col-md-6 mb-3">
                <label for="platform_type" class="form-label">Platform Type</label>
                <input type="text" name="platform_type" id="platform_type" class="form-control"
                       value="{{ old('platform_type') }}">
            </div>

            {{-- Subscription Type --}}
            <div class="col-md-6 mb-3">
                <label for="subscription_type" class="form-label">Subscription Type</label>
                <input type="text" name="subscription_type" id="subscription_type" class="form-control"
                       value="{{ old('subscription_type') }}">
            </div>

            {{-- Subscribers --}}
            <div class="col-md-6 mb-3">
                <label for="subscribers" class="form-label">Subscribers</label>
                <input type="text" name="subscribers" id="subscribers" class="form-control"
                       placeholder="e.g., 1.2M, 450K+" value="{{ old('subscribers') }}">
            </div>

            {{-- Political Affiliation --}}
            <div class="col-md-6 mb-3">
                <label for="political_affiliation" class="form-label">Political Affiliation</label>
                <input type="text" name="political_affiliation" id="political_affiliation" class="form-control"
                       value="{{ old('political_affiliation') }}">
            </div>

            {{-- Contact Person for Unilever --}}
            <div class="col-md-6 mb-3">
                <label for="contact_person_for_unilever" class="form-label">Contact Person for Unilever</label>
                <input type="text" name="contact_person_for_unilever" id="contact_person_for_unilever" class="form-control"
                       value="{{ old('contact_person_for_unilever') }}">
            </div>

            {{-- Platform USP --}}
            <div class="col-12 mb-3">
                <label for="platform_usp" class="form-label">Platform USP</label>
                <textarea name="platform_usp" id="platform_usp" rows="2" class="form-control">{{ old('platform_usp') }}</textarea>
            </div>

            {{-- Available Performance Metrics --}}
            <div class="col-12 mb-3">
                <label for="available_performance_metrics" class="form-label">Available Performance Metrics</label>
                <textarea name="available_performance_metrics" id="available_performance_metrics" rows="2" class="form-control">{{ old('available_performance_metrics') }}</textarea>
            </div>

            {{-- Recent Changes in Management/Ownership --}}
            <div class="col-12 mb-3">
                <label for="recent_changes_in_management_ownership" class="form-label">Recent Changes in Management/Ownership</label>
                <textarea name="recent_changes_in_management_ownership" id="recent_changes_in_management_ownership" rows="2" class="form-control">{{ old('recent_changes_in_management_ownership') }}</textarea>
            </div>

            {{-- Primary Audience Demographics --}}
            <div class="col-12 mb-3">
                <label for="primary_audience_demographics" class="form-label">Primary Audience Demographics</label>
                <textarea name="primary_audience_demographics" id="primary_audience_demographics" rows="2" class="form-control">{{ old('primary_audience_demographics') }}</textarea>
            </div>

            {{-- Ad Format Availability --}}
            <div class="col-12 mb-3">
                <label for="ad_format_availability" class="form-label">Ad Format Availability</label>
                <textarea name="ad_format_availability" id="ad_format_availability" rows="2" class="form-control">{{ old('ad_format_availability') }}</textarea>
            </div>

            {{-- Historical Performance Highlights --}}
            <div class="col-12 mb-3">
                <label for="historical_performance_highlights" class="form-label">Historical Performance Highlights</label>
                <textarea name="historical_performance_highlights" id="historical_performance_highlights" rows="2" class="form-control">{{ old('historical_performance_highlights') }}</textarea>
            </div>

            {{-- Platform Reach Geography --}}
            <div class="col-12 mb-3">
                <label for="platform_reach_geography" class="form-label">Platform Reach Geography</label>
                <textarea name="platform_reach_geography" id="platform_reach_geography" rows="2" class="form-control">{{ old('platform_reach_geography') }}</textarea>
            </div>

            {{-- Notes/Remarks --}}
            <div class="col-12 mb-4">
                <label for="notes_remarks" class="form-label">Notes/Remarks</label>
                <textarea name="notes_remarks" id="notes_remarks" rows="2" class="form-control">{{ old('notes_remarks') }}</textarea>
            </div>
        </div>

        <button class="btn btn-primary">Save Info</button>
        <a href="{{ route('platform-info.index') }}" class="btn btn-outline-secondary ms-2">Go to Index</a>
    </form>
</div>
@endsection
