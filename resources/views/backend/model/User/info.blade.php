@extends('eshop::backend')

@section('title', trans('eshop::model.Insert'). ' '.$m=eshop()->blade()->model($model))

@section('css')
@endsection

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            @include("eshop::part.model.nav")
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <pre><code class="language-json">{!! json_encode($current->payload(), JSON_PRETTY_PRINT) !!}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
