@extends('eshop::backend.layout')

@section('title', 'Shippo | Impostazioni delle Spedizioni')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a href="#!" class="p-none">Spedizioni</a>
                                <i data-tippy-content="Qui sono obbligatorie le chiavi del tuo Account Shippo"
                                   class="fas fa-info-circle"></i>

                                <i onclick="window.open('//app.goshippo.com/settings/api')" data-tippy-content="Vai al tuo account Shippo"
                                   class="fas fa-external-link-alt"></i>

                            </h4>
                        </div>
                        @include('eshop::backend.components.side.setting',['current'=>'shipping'])
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @include('eshop::backend.components.forms.setting.shipping')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
