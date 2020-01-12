<div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card profile_card">
        <div class="card-body">
            <div data-cart="{{eshop()->cart()->count()}}"
                 data-payment="{{eshop()->payment()->count()}}"
                 data-order="{{eshop()->order()->count()}}"
                 data-media="{{eshop()->shipping()->count()}}"
                 id="products-chart"></div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card acc_balance">
        <div class="card-header">
            <h4 class="card-title">Resoconto</h4>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-between my-4">
                <div>
                    <p class="mb-1">cart</p>
                    <h3>{{eshop()->cart()->count()}}</h3>
                </div>
                <div>
                    <p class="mb-1">payment</p>
                    <h3>{{eshop()->payment()->count()}}</h3>
                </div>
            </div>

            <div class="d-flex justify-content-between my-4">
                <div>
                    <p class="mb-1">order</p>
                    <h3>{{eshop()->order()->count()}}</h3>
                </div>
                <div>
                    <p class="mb-1">shipping</p>
                    <h3>{{eshop()->shipping()->count()}}</h3>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-5 col-lg-5">
    <div class="card">
        <div class="card-body">
            <div class="buy-sell-widget">
                <ul class="nav nav-tabs">
                    <li class="nav-item" style="pointer-events: none">
                        <a class="nav-link active" data-toggle="tab" href="#Service">+ Servizio</a>
                    </li>
                </ul>
                <div class="tab-content tab-content-default">
                    <div class="tab-pane fade active show" id="Service">
                        @include('eshop::backend.components.forms.newServices')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
