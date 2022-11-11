<header>
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top shadow-md py-4">
    <div class="container container-menu"> <!-- container-menu -->
        <a class="navbar-brand" href="{{ url('/view/login') }}"><img src="{{ asset('img/logo_theone.png') }}" alt="The One Life logo" class="logoC"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-autoL mb-2 mb-lg-0">
            <li class="nav-item item-flag">
                <a class="nav-link active" href="{{ url('/view/admin/vendedores') }}">Vendedores</a>
            </li>
            <li class="nav-item item-flag">
                <a class="nav-link active" href="{{ url('/view/admin/clientes') }}">Clientes</a>
            </li>
            <li class="nav-item item-flag">
                <a href="" type="button" class="nav-link active" id="salir">Cerrar sesión</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</header>
