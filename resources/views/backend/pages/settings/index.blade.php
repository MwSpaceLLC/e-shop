@extends('eshop::backend.layout')

@section('title', 'Impostazioni Generali')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a href="#!" class="p-none">Impostazioni Generali</a>
                                <i data-tippy-content="Informazioni che saranno pubbliche e verranno utilizzate dal sistema di spedizione"
                                   class="fas fa-info-circle"></i>
                            </h4>
                        </div>
                        @include('eshop::backend.components.side.setting',['current'=>'global'])
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @include('eshop::backend.components.forms.setting.global')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
