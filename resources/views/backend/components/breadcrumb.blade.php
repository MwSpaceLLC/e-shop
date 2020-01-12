<div class="page-title dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-content">
                    <p>
                        @if(isset($category))
                            <a href="{{backend('catalog')}}"><i class="fas fa-chevron-circle-left"></i> Catalogo</a> /
                            @if(isset($service))
                                <a href="{{backend("category/{$category->id}/services")}}">Servizi</a> /
                            @endif
                        @endif
                        <span>Welcome Back {{eshop()->auth()->admin()->name}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
