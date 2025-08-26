@extends('master.master')

@section('mezba')
<div class="container mt-4">
    <h3>Add Platform Data</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Create form --}}
    <form action="{{ route('platform.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="platform_name" class="form-label">Platform Name</label>
                    <input type="text" name="platform_name" id="platform_name"
                           class="form-control @error('platform_name') is-invalid @enderror"
                           placeholder="Enter Platform Name" value="{{ old('platform_name') }}" required>
                    @error('platform_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>

    {{-- Table list --}}
    <div class="mt-5">
        <h4>Platform List</h4>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 80px;">#</th>
                    <th>Platform Name</th>
                    <th>Add Platform Info</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($platforms as $index => $platform)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $platform->platform_name }}</td>
                        <td><a class="btn btn-success" href="{{route('platform-info.create')}}">Add Platform Info</a></td>
                        <td>
                            <form action="{{ route('platform.destroy', $platform->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this platform?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No platforms added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
