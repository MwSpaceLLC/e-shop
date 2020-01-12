<div class="page-title dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-content">
                    <p>
                        @if(eshop()->route()->is([
                        'eshop-view-products',
                        'eshop-view-services',
                        'eshop-edit-product',
                        'eshop-edit-service',
                        ]))
                            <a href="{{backend('catalog')}}"><i class="fas fa-chevron-circle-left"></i> Catalogo</a>
                        @endif
                        @if(eshop()->route()->is('eshop-edit-product'))
                            / <a class="text-warning" href="{{backend("category/{$category->id}/products")}}">
                                <i class="fas fa-chevron-left"></i> {{$category->name}}</a>
                        @endif
                        @if(eshop()->route()->is('eshop-edit-service'))
                            / <a class="text-warning" href="{{backend("category/{$category->id}/services")}}">
                                <i class="fas fa-chevron-left"></i> {{$category->name}}</a>
                        @endif
                        @if(request()->is(basename(backend())))
                            <span>Welcome Back {{eshop()->auth()->admin()->name}}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
