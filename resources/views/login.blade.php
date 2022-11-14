@include('layouts.headers')

<div class="row d-flex justify-content-center background-blue">
    <div class="col-md-3 col-sm-12">
        <div class="container-centered">
            <div>
                <div class="d-flex justify-content-center">
                    <div class="img-user">
                        <img src="{{ asset('img/perfil-del-usuario.png') }}" alt="" width="86">
                    </div>
                </div>
                <div>
                    <form id="form-inicio" class="my-5" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group mb-4">
                            <input type="email" class="input-form-white" id="usuario" name="email" placeholder="ID" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="input-form-white" id="password" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group mb-2">
                            <a href="">Olvidé mi contraseña</a>
                        </div>
                        <div class="form-group my-5" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn-primary-theone">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.scripts')