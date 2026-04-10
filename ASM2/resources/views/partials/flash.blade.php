@if (session('success'))
    <div class="alert alert-success rounded-3">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger rounded-3">
        {{ session('error') }}
    </div>
@endif
