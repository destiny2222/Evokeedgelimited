<div class="page-header">
    <h1 class="page-title fw-bold">@yield('page-title', '')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-page') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('page-title', '')</li>
        </ol>
    </div>
</div>