@extends('eshop::backend.layout')

@section('title', 'Stripe | Impostazioni dei Pagamenti')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a href="#!" class="p-none">Pagamenti</a>
                                <i data-tippy-content="Qui sono obbligatorie le chiavi del tuo Account Stripe"
                                   class="fas fa-info-circle"></i>

                                <i onclick="window.open('//dashboard.stripe.com/test/apikeys')"
                                   data-tippy-content="Vai al tuo account Shippo"
                                   class="fas fa-external-link-alt"></i>
                            </h4>
                        </div>
                        @include('eshop::backend.components.side.setting',['current'=>'payment'])
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @include('eshop::backend.components.forms.setting.payment')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
