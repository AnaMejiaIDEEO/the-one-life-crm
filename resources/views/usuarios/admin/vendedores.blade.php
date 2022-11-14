@include('layouts.headers')
@include('layouts.menus.menu-admin')

<div class="container-frame container">
    <div class="row d-flex justify-content-center">
        <h3 class="mb-5">> Vendedores</h3>
        <div class="col-md-3 col-sm-12">
            <ul>
            @foreach ($vendedores as $v)
                <li>{{ $v->nombre}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

@include('layouts.scripts')