<header>
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top shadow-md navbar-theone">
    <div class="container-fluid">
        <div class="container mt-2 mb-4">
            <a class="navbar-brand" href="{{ url('/usuarios/admin/index') }}"><img src="{{ asset('img/logo_theone.png') }}" alt="The One Life logo" class="logo-header"></a>
        </div>
    </div>
    <div class="container-fluid container-menu background-blue">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-autoL mb-2 mb-lg-0">
                    <li class="nav-item item-flag">
                        <a class="nav-link active" href="{{ url('/view/admin/index') }}">Inicio</a>
                    </li>
                    <li class="nav-item item-flag">
                        <a class="nav-link active" href="{{ url('/view/admin/vendedores', ['token'=>$token]) }}">Vendedores</a>
                    </li>
                    <li class="nav-item item-flag">
                        <a class="nav-link active" href="{{ url('/view/admin/clientes') }}">Clientes</a>
                    </li>
                    <li class="nav-item item-flag">
                        <a href="{{ url('/logout') }}" type="button" class="nav-link active" id="salir">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </nav>
</header>
