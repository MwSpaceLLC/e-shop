@extends('eshop::backend')

@section('title', trans('eshop::model.Insert'). ' '.$m=get_model($model))

@section('css')
@endsection

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            @include("eshop::backend.model.nav")
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="Tax" action="{{route('eshop-post-model', ['model'=>$m])}}"> @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="https://image.flaticon.com/icons/svg/584/584057.svg" width="100%">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.TaxName')*" required="">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="payload[country]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.TaxCountry')">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[percentage]"
                                                           class="form-control tax"
                                                           placeholder="@lang('eshop::model.TaxPercentage')">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control"
                                                              rows="6"
                                                              data-placeholder="@lang('eshop::model.TaxDescription')"></textarea>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-3 offset-md-9">
                                                    <button class="btn btn-primary btn-block" style="zoom: 1.5"
                                                            type="submit">
                                                        @lang('eshop::model.CreateNew')
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

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
