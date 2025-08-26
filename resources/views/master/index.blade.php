@extends('master.master')

@section('mezba')
<div class="container d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 200px);">
    <div class="text-center">
        <!-- Welcome Header -->
        <div class="mb-5">
            <h2 class="fw-bold mb-3" style="color: #1F70C1;">Platform Management System</h2>
            <p class="text-muted fs-5">Manage your platforms and their information efficiently</p>
        </div>

        <!-- Action Buttons Grid -->
        <div class="row g-4 justify-content-center">
            <!-- First Row -->
            <!-- Create Platform -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm h-100 action-card">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Create Platform</h5>
                        <p class="text-muted small mb-4">Add a new platform to the system</p>
                        <a href="{{ route('platform.create') }}" class="btn btn-primary w-100">
                            Create Platform
                        </a>
                    </div>
                </div>
            </div>

            <!-- Add Platform Info -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm h-100 action-card">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Add Platform Info</h5>
                        <p class="text-muted small mb-4">Add detailed information to platforms</p>
                        <a href="{{ route('platform-info.create') }}" class="btn btn-success w-100">
                            Add Info
                        </a>
                    </div>
                </div>
            </div>

            <!-- Second Row -->
            <!-- Show Platforms -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm h-100 action-card">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Show Platforms</h5>
                        <p class="text-muted small mb-4">View all created platforms</p>
                        <a href="{{ route('platform.create') }}" class="btn btn-info w-100">
                            View Platforms
                        </a>
                    </div>
                </div>
            </div>

            <!-- Show Platform Info -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm h-100 action-card">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Show Platform Info</h5>
                        <p class="text-muted small mb-4">View detailed platform information</p>
                        <a href="{{ route('platform-info.index') }}" class="btn btn-warning w-100">
                            View Info
                        </a>
                    </div>
                </div>
            </div>
        </div>

       
        
    </div>
</div>

<style>
/* Action Cards */
.action-card {
    border-radius: 12px;
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    border-color: #e0e0e0;
}



/* Button Styles */
.btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 12px 24px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Unilever Brand Colors */
.bg-primary, .btn-primary {
    background-color: #1F70C1 !important;
    border-color: #1F70C1 !important;
}

.text-primary {
    color: #1F70C1 !important;
}

.btn-primary:hover {
    background-color: #1a5ea8 !important;
    border-color: #1a5ea8 !important;
}

/* Card Titles */
.card-title {
    font-weight: 600;
    color: #2c3e50;
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .action-card {
        margin-bottom: 1rem;
    }
    
    .card-title {
        font-size: 1rem;
    }
    
    .btn {
        padding: 10px 20px;
        font-size: 0.85rem;
    }
}

/* Clean borders and shadows */
.shadow-sm {
    box-shadow: 0 2px 10px rgba(0,0,0,0.08) !important;
}

.border-top {
    border-color: #e9ecef !important;
}

/* Typography */
h2.fw-bold {
    font-weight: 700;
    font-size: 2.2rem;
}

@media (max-width: 576px) {
    h2.fw-bold {
        font-size: 1.8rem;
    }
}
</style>
@endsection