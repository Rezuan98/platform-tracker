@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <h3>Select Platform</h3>

    <form action="" method="GET">
        <div class="mb-3">
            <select onchange="window.location.href='/platform/' + this.value" class="form-select">
                <option value="">-- Select Platform --</option>
                @foreach($platforms as $platform)
                    <option value="{{ $platform->id }}">{{ $platform->platform_name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
@endsection
