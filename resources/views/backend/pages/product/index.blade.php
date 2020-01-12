@extends('eshop::backend.layout')

@section('title', $product->name)

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title"><span class="badge badge-info">{{$product->name}}</span>
                                <a href="#!" class="p-none">Dati Generali</a></h4>
                        </div>
                        @include('eshop::backend.components.side.product',['current'=>'update'])
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @include('eshop::backend.components.forms.product.update')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
