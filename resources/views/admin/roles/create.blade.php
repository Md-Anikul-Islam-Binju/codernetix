@extends('admin.app')
@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex justify-content-between align-items-center">
                <h4 class="page-title">Create Role</h4>
                <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>Whoops!</strong> There were some problems with your input:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.store') }}" class="mt-3">
        @csrf

        <div class="form-group mb-3">
            <label><strong>Role Name</strong></label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter role name">
        </div>

        <div class="form-group mb-3">
            <label><strong>Permissions</strong></label><br>
            @foreach($permission as $value)
                <label class="d-block">
                    <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                        {{ (is_array(old('permission')) && in_array($value->name, old('permission'))) ? 'checked' : '' }}>
                    {{ $value->name }}
                </label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i> Submit
        </button>
    </form>

@endsection

