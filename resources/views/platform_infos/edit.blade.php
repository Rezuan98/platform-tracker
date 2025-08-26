@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3>Edit Platform Info - {{ $platform->platform_name }}</h3>
            <p class="text-muted mb-0">Update comprehensive platform details</p>
        </div>
        <div>
            <a href="{{ route('platform-info.index', ['platform_id' => $platform->id]) }}" class="btn btn-success me-2">
                <i class="fas fa-eye"></i> View Platform Details
            </a>
            <a href="{{ route('platform-info.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>Please correct the following errors:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Form Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0 text-dark">
                <i class="fas fa-edit me-2"></i>Edit Platform Information
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('platform-info.update', $platform) }}" method="POST" id="platformInfoForm">
                @csrf
                @method('PUT')

                <!-- Platform Display Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white py-2">
                                <h6 class="mb-0"><i class="fas fa-desktop me-2"></i>Platform Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <strong>Editing information for:</strong> {{ $platform->platform_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Information Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white py-2">
                                <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editor_lead" class="form-label fw-bold">Editor/Lead</label>
                                        <input type="text" name="editor_lead" id="editor_lead" 
                                               class="form-control" value="{{ old('editor_lead', $info->editor_lead ?? '') }}"
                                               placeholder="Enter editor or lead name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="platform_type" class="form-label fw-bold">Platform Type</label>
                                        <input type="text" name="platform_type" id="platform_type" 
                                               class="form-control" value="{{ old('platform_type', $info->platform_type ?? '') }}"
                                               placeholder="e.g. Social Media, News, Entertainment">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="subscription_type" class="form-label fw-bold">Subscription Type</label>
                                        <input type="text" name="subscription_type" id="subscription_type" 
                                               class="form-control" value="{{ old('subscription_type', $info->subscription_type ?? '') }}"
                                               placeholder="e.g. Free, Premium, Freemium">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="subscribers" class="form-label fw-bold">Subscribers</label>
                                        <input type="text" name="subscribers" id="subscribers" 
                                               class="form-control" value="{{ old('subscribers', $info->subscribers ?? '') }}"
                                               placeholder="e.g. 1.2M, 450K+">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & Affiliation Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark py-2">
                                <h6 class="mb-0"><i class="fas fa-users me-2"></i>Contact & Affiliation</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="political_affiliation" class="form-label fw-bold">Political Affiliation</label>
                                        <input type="text" name="political_affiliation" id="political_affiliation" 
                                               class="form-control" value="{{ old('political_affiliation', $info->political_affiliation ?? '') }}"
                                               placeholder="Enter political stance if any">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contact_person_for_unilever" class="form-label fw-bold">Contact Person for Unilever</label>
                                        <input type="text" name="contact_person_for_unilever" id="contact_person_for_unilever" 
                                               class="form-control" value="{{ old('contact_person_for_unilever', $info->contact_person_for_unilever ?? '') }}"
                                               placeholder="Enter contact person name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Information Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-info">
                            <div class="card-header bg-info text-white py-2">
                                <h6 class="mb-0"><i class="fas fa-list-alt me-2"></i>Detailed Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="platform_usp" class="form-label fw-bold">Platform USP</label>
                                        <textarea name="platform_usp" id="platform_usp" rows="3" 
                                                  class="form-control" placeholder="Describe the platform's unique selling proposition">{{ old('platform_usp', $info->platform_usp ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="available_performance_metrics" class="form-label fw-bold">Available Performance Metrics</label>
                                        <textarea name="available_performance_metrics" id="available_performance_metrics" rows="3" 
                                                  class="form-control" placeholder="List available metrics for tracking performance">{{ old('available_performance_metrics', $info->available_performance_metrics ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="primary_audience_demographics" class="form-label fw-bold">Primary Audience Demographics</label>
                                        <textarea name="primary_audience_demographics" id="primary_audience_demographics" rows="3" 
                                                  class="form-control" placeholder="Describe target audience demographics">{{ old('primary_audience_demographics', $info->primary_audience_demographics ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="ad_format_availability" class="form-label fw-bold">Ad Format Availability</label>
                                        <textarea name="ad_format_availability" id="ad_format_availability" rows="3" 
                                                  class="form-control" placeholder="List available advertising formats">{{ old('ad_format_availability', $info->ad_format_availability ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance & Geography Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-secondary">
                            <div class="card-header bg-secondary text-white py-2">
                                <h6 class="mb-0"><i class="fas fa-chart-line me-2"></i>Performance & Geography</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="historical_performance_highlights" class="form-label fw-bold">Historical Performance Highlights</label>
                                        <textarea name="historical_performance_highlights" id="historical_performance_highlights" rows="3" 
                                                  class="form-control" placeholder="Describe past performance achievements">{{ old('historical_performance_highlights', $info->historical_performance_highlights ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="platform_reach_geography" class="form-label fw-bold">Platform Reach Geography</label>
                                        <textarea name="platform_reach_geography" id="platform_reach_geography" rows="3" 
                                                  class="form-control" placeholder="Describe geographical reach and coverage">{{ old('platform_reach_geography', $info->platform_reach_geography ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="recent_changes_in_management_ownership" class="form-label fw-bold">Recent Changes in Management/Ownership</label>
                                        <textarea name="recent_changes_in_management_ownership" id="recent_changes_in_management_ownership" rows="3" 
                                                  class="form-control" placeholder="Describe any recent organizational changes">{{ old('recent_changes_in_management_ownership', $info->recent_changes_in_management_ownership ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Notes Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-dark">
                            <div class="card-header bg-dark text-white py-2">
                                <h6 class="mb-0"><i class="fas fa-sticky-note me-2"></i>Additional Notes</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="notes_remarks" class="form-label fw-bold">Notes/Remarks</label>
                                    <textarea name="notes_remarks" id="notes_remarks" rows="4" 
                                              class="form-control" placeholder="Add any additional notes or remarks">{{ old('notes_remarks', $info->notes_remarks ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg me-3">
                                    <i class="fas fa-save me-2"></i>Update Platform Info
                                </button>
                                <a href="{{ route('platform-info.index', ['platform_id' => $platform->id]) }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('platform-info.index', ['platform_id' => $platform->id]) }}" class="btn btn-success btn-lg me-2">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                                <a href="{{ route('platform-info.index') }}" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-list me-2"></i>All Platforms
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.card {
    border-radius: 10px;
    margin-bottom: 1rem;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    font-weight: 500;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1.5px solid #e0e6ed;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #1F70C1;
    box-shadow: 0 0 0 0.2rem rgba(31, 112, 193, 0.25);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.alert {
    border-radius: 10px;
}

.fw-bold {
    font-weight: 600;
}

.text-primary {
    color: #1F70C1 !important;
}

.bg-primary {
    background-color: #1F70C1 !important;
}

.border-primary {
    border-color: #1F70C1 !important;
}

.btn-primary {
    background-color: #1F70C1;
    border-color: #1F70C1;
}

.btn-primary:hover {
    background-color: #1a5ea8;
    border-color: #1a5ea8;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-lg {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }
}
</style>

<!-- JavaScript for Enhanced Functionality -->
<script>
// Auto-resize textareas
document.addEventListener('DOMContentLoaded', function() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        // Initial resize
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    });
});
</script>
@endsection