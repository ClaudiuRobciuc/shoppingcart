<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-left">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Shop') }}
        </a>
        <a class="nav-link" href="{{ route('frontpage.shop.index') }}">View Cart </a>
    </div>
</nav>
