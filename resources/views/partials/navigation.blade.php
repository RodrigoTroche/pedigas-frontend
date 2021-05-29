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
                    <a class="nav-link" href="{{ url('') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.about') }}">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Términos</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.index') }}">Mi cuenta</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>