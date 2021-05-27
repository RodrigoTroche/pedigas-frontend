<nav class="navbar navbar-expand-md">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.about') }}">Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Términos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>