<div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card profile_card">
        <div class="card-body">
            <div data-category="{{eshop()->category()->count()}}"
                 data-product="{{eshop()->product()->count()}}"
                 data-tax="{{eshop()->tax()->count()}}"
                 data-media="{{eshop()->media()->count()}}"
                 id="catalogue-chart"></div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-lg-2 col-md-6">
    <div class="card acc_balance">
        <div class="card-header">
            <h4 class="card-title">Resoconto</h4>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-between my-4">
                <div>
                    <p class="mb-1">Categorie</p>
                    <h3>{{eshop()->category()->count()}}</h3>
                </div>
                <div>
                    <p class="mb-1">Media</p>
                    <h3>{{eshop()->media()->count()}}</h3>
                </div>
            </div>

            <div class="d-flex justify-content-between my-4">
                <div>
                    <p class="mb-1">Prodotti</p>
                    <h3>{{eshop()->product()->count()}}</h3>
                </div>
                <div>
                    <p class="mb-1">Tasse</p>
                    <h3>{{eshop()->tax()->count()}}</h3>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="buy-sell-widget">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"
                           href="#Category">+ Categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Tax">+ Tassa</a>
                    </li>
                </ul>
                <div class="tab-content tab-content-default">
                    <div class="tab-pane fade active show" id="Category" role="tabpanel">
                        @include('eshop::backend.components.forms.newCategory')
                    </div>
                    <div class="tab-pane fade" id="Tax">
                        @include('eshop::backend.components.forms.newTax')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
