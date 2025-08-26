@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="header-section mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="page-title mb-2">Platform Information Dashboard</h5>
                
            </div>
            <div class="header-actions">
                <a href="{{ route('platform-info.create') }}" class="btn btn-primary btn-md me-2">
                    Create Platform Info
                </a>
                <a href="{{ route('platform.create') }}" class="btn btn-success btn-md">
                    Create Platform
                </a>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filters Card -->
    <div class="card filter-card shadow-sm mb-4">
        <div class="card-header bg-gradient-primary text-white">
            <h5 class="mb-0">Filter & Search Options</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('platform-info.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="platform_id" class="form-label fw-bold">
                        Select Platform
                    </label>
                    <select name="platform_id" id="platform_id" class="form-select form-select-lg" onchange="this.form.submit()">
                        <option value="">-- All Platforms --</option>
                        @foreach($platforms as $p)
                            <option value="{{ $p->id }}" {{ (string)$selectedPlatformId === (string)$p->id ? 'selected' : '' }}>
                                {{ $p->platform_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="platform_type" class="form-label fw-bold">
                        Filter by Platform Type
                    </label>
                    <select name="platform_type" id="platform_type" class="form-select form-select-lg" onchange="this.form.submit()">
                        <option value="">-- All Platform Types --</option>
                        @foreach($platformTypes as $type)
                            <option value="{{ $type }}" {{ $selectedPlatformType === $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4 d-flex align-items-end">
                    <div class="w-100">
                        @if($selectedPlatformType || $selectedPlatformId)
                            <a href="{{ route('platform-info.index') }}" class="btn btn-outline-danger btn-md w-100">
                                Clear All Filters
                            </a>
                        @else
                            <button type="button" class="btn btn-outline-info btn-md w-100" disabled>
                                No Filters Applied
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section -->
    <div class="results-section">
        {{-- Single Platform View --}}
        @if($selectedPlatformId && $selectedPlatform)
            <div class="platform-detail-card">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-info text-white d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">{{ $selectedPlatform->platform_name }}</h4>
                            @if($info && $info->platform_type)
                                <span class="badge bg-light text-dark fs-6">{{ $info->platform_type }}</span>
                            @endif
                        </div>
                        <div>
                            @if($info)
                                <a href="{{ route('platform-info.edit', $selectedPlatform) }}" 
                                   class="btn btn-light btn-sm">
                                    Edit Info
                                </a>
                            @else
                                <a href="{{ route('platform-info.create', ['platform_id' => $selectedPlatform->id]) }}" 
                                   class="btn btn-light btn-sm">
                                    Add Info
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if($info)
                         
                                <table class="table table-hover mb-0 platform-info-table">
                                    <tbody>
                                        <tr class="table-row">
                                            <th class="info-label">Editor/Lead</th>
                                            <td class="info-value">{{ $info->editor_lead ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Platform Type</th>
                                            <td class="info-value">
                                                @if($info->platform_type)
                                                    <span class="badge bg-primary">{{ $info->platform_type }}</span>
                                                @else
                                                    Not specified
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Platform USP</th>
                                            <td class="info-value">{{ $info->platform_usp ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Performance Metrics</th>
                                            <td class="info-value">{{ $info->available_performance_metrics ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Subscription Type</th>
                                            <td class="info-value">{{ $info->subscription_type ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Subscribers</th>
                                            <td class="info-value">
                                                @if($info->subscribers)
                                                    <span class="badge bg-success fs-6">{{ $info->subscribers }}</span>
                                                @else
                                                    Not specified
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Political Affiliation</th>
                                            <td class="info-value">{{ $info->political_affiliation ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Recent Changes</th>
                                            <td class="info-value">{{ $info->recent_changes_in_management_ownership ?: 'No recent changes' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Unilever Contact</th>
                                            <td class="info-value">{{ $info->contact_person_for_unilever ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Audience Demographics</th>
                                            <td class="info-value">{{ $info->primary_audience_demographics ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Ad Formats</th>
                                            <td class="info-value">{{ $info->ad_format_availability ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Performance Highlights</th>
                                            <td class="info-value">{{ $info->historical_performance_highlights ?: 'No highlights recorded' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Geographic Reach</th>
                                            <td class="info-value">{{ $info->platform_reach_geography ?: 'Not specified' }}</td>
                                        </tr>
                                        <tr class="table-row">
                                            <th class="info-label">Notes/Remarks</th>
                                            <td class="info-value">{{ $info->notes_remarks ?: 'No additional notes' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                           
                        @else
                            <div class="alert alert-warning m-4 text-center">
                                <h5>No Information Available</h5>
                                <p class="mb-3">No detailed information has been saved for <strong>{{ $selectedPlatform->platform_name }}</strong> yet.</p>
                                <a class="btn btn-primary btn-md" href="{{ route('platform-info.create', ['platform_id' => $selectedPlatform->id]) }}">
                                    Add Information Now
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        {{-- Platform Type Filter View --}}
        @elseif($selectedPlatformType && $filteredPlatforms->isNotEmpty())
            <div class="filter-results mb-4">
                <div class="alert alert-info d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">Filter Results</h5>
                        <p class="mb-0">Showing <strong>{{ $filteredPlatforms->count() }}</strong> platform(s) with type: <strong class="text-primary">{{ $selectedPlatformType }}</strong></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @foreach($filteredPlatforms as $filteredPlatform)
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="card platform-card h-100 shadow-sm">
                            <div class="card-header bg-gradient-secondary text-white d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 fw-bold">{{ $filteredPlatform->platform_name }}</h6>
                                <span class="badge bg-light text-dark">{{ $filteredPlatform->info->platform_type }}</span>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">Editor/Lead:</small>
                                        <strong class="d-block">{{ $filteredPlatform->info->editor_lead ?? 'N/A' }}</strong>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Subscribers:</small>
                                        <strong class="d-block">{{ $filteredPlatform->info->subscribers ?? 'N/A' }}</strong>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted mb-1">Platform USP:</small>
                                    <p class="text-sm mb-0">{{ Str::limit($filteredPlatform->info->platform_usp ?? 'No USP specified', 120) }}</p>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a href="{{ route('platform-info.index', ['platform_id' => $filteredPlatform->id]) }}" 
                                   class="btn btn-primary btn-sm me-2">
                                    View Details
                                </a>
                                <a href="{{ route('platform-info.edit', $filteredPlatform) }}" 
                                   class="btn btn-outline-secondary btn-sm">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        {{-- Empty State for Platform Type Filter --}}
        @elseif($selectedPlatformType && $filteredPlatforms->isEmpty())
            <div class="empty-state text-center">
                <div class="card shadow-sm">
                    <div class="card-body py-5">
                        <h4 class="text-muted">No Platforms Found</h4>
                        <p class="text-muted mb-4">No platforms found with type: <strong>{{ $selectedPlatformType }}</strong></p>
                        <a href="{{ route('platform-info.index') }}" class="btn btn-primary">
                            View All Platforms
                        </a>
                    </div>
                </div>
            </div>

        {{-- Platform Not Found --}}
        @elseif($selectedPlatformId && !$selectedPlatform)
            <div class="empty-state text-center">
                <div class="card shadow-sm">
                    <div class="card-body py-5">
                        <h4 class="text-warning">Platform Not Found</h4>
                        <p class="text-muted mb-4">The selected platform could not be found.</p>
                        <a href="{{ route('platform-info.index') }}" class="btn btn-primary">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>

        {{-- Default State --}}
        @else
            <div class="welcome-state">
                <div class="card shadow-sm">
                    
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Custom Styles -->
<style>
.page-title {
    color: #1F70C1;
    font-weight: 700;
    font-size: 2.5rem;
}

.page-subtitle {
    font-size: 1.1rem;
}

.header-actions .btn {
    border-radius: 10px;
    font-weight: 600;
    padding: 12px 24px;
    transition: all 0.3s ease;
}

.header-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.filter-card {
    border-radius: 15px;
    overflow: hidden;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #1F70C1 0%, #1a5ea8 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.bg-gradient-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #545b62 100%);
}

.form-select, .form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-select:focus, .form-control:focus {
    border-color: #1F70C1;
    box-shadow: 0 0 0 0.2rem rgba(31, 112, 193, 0.25);
}

.platform-info-table {
    font-size: 1rem;
}

.info-label {
    background-color: #f8f9fa;
    width: 280px; /* Reduced from 300px */
    max-width: 35%; /* Add flexibility */
    font-weight: 600;
    color: #495057;
    border-right: 3px solid #1F70C1;
    vertical-align: middle;
    text-align: center;
    padding: 18px 15px;
}

.info-value {
    padding: 18px 20px;
    vertical-align: middle;
    line-height: 1.6;
    text-align: center;
}

.table-row {
    transition: all 0.3s ease;
}

.table-row:hover {
    background-color: rgba(31, 112, 193, 0.05);
    transform: scale(1.01);
}

.platform-card {
    border-radius: 15px;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.platform-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: #1F70C1;
}

.custom-alert {
    border-radius: 10px;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.empty-state, .welcome-state {
    min-height: 300px;
    display: flex;
    align-items: center;
}

.empty-state .card, .welcome-state .card {
    border-radius: 15px;
    border: 2px dashed #dee2e6;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.badge {
    font-weight: 500;
    padding: 8px 14px;
    border-radius: 6px;
}

.fw-bold {
    font-weight: 600;
}

.text-primary {
    color: #1F70C1 !important;
}

.btn-primary {
    background-color: #1F70C1;
    border-color: #1F70C1;
}

.btn-primary:hover {
    background-color: #1a5ea8;
    border-color: #1a5ea8;
}

.card {
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
}

/* Smooth table styling */
.platform-info-table tbody tr {
    border-bottom: 1px solid #f0f0f0;
}

.platform-info-table tbody tr:last-child {
    border-bottom: none;
}

/* Center alignment for better readability */
.info-value .badge {
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .header-actions {
        margin-top: 1rem;
    }
    
    .header-actions .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .info-label {
        width: 160px;
        font-size: 0.85rem;
        padding: 15px 10px;
    }
    
    .info-value {
        font-size: 0.9rem;
        padding: 15px;
    }
}

@media (max-width: 576px) {
    .d-flex.justify-content-between.align-items-center {
        flex-direction: column;
        align-items: start !important;
    }
    
    .header-actions {
        width: 100%;
        margin-top: 1rem;
    }
    
    .info-label, .info-value {
        text-align: left;
    }
}
</style>

@endsection