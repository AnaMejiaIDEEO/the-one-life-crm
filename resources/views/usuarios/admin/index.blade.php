@include('layouts.headers')
@include('layouts.menus.menu-admin')

<div class="container-frame container">
    <div class="row d-flex justify-content-center">
        <h3 class="mb-5">> Inicio</h3>
        <div class="col-md-3 col-sm-12">
            <div class="container-centered">
                <div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/person-digging-solid.svg') }}" alt="" width="86">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.scripts')