@if (session()->has('success'))
    <div class="alert alert-bottom alert-success alert-dismissible fade show" role="alert">
        <span class="ml-4">{{ session()->get('success') }}!</span>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-bottom alert-danger alert-dismissible fade show" role="alert">
        <span class="ml-4">{{ session()->get('error') }}!</span>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-bottom alert-danger alert-dismissible fade show" role="alert">
        <span class="ml-4">Please fix the following errors:</span>
        @foreach ($errors->all() as $error)
            <small>{{ $error }}</small>
        @endforeach
    </div>
@endif
