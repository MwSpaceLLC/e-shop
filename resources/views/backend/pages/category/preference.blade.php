@extends('eshop::backend.layout')

@section('title', $category->payload()->name)

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="card settings_menu">
                        <div class="card-header">
                            <h4 class="card-title"><span class="badge badge-info">{{$category->payload()->name}}</span>
                                <a href="#!" class="p-none">Preferenze</a></h4>
                        </div>
                        @include('eshop::backend.components.side.category')
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @include('eshop::backend.components.forms.category.preference')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
