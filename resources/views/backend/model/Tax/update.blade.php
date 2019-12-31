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
                                <form enctype="multipart/form-data" method="post"
                                      id="Product"
                                      action="{{route('eshop-post-model', ['model'=>$m,'current'=>$current->id])}}"> @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="https://image.flaticon.com/icons/svg/584/584057.svg" width="100%">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.TaxName')*" required="" value="{{$current->payload()->name}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="payload[country]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.TaxCountry')" value="{{$current->payload()->country}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[percentage]"
                                                           class="form-control tax"
                                                           placeholder="@lang('eshop::model.TaxPercentage')" value="{{$current->payload()->percentage}}">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control"
                                                              rows="6"
                                                              data-placeholder="@lang('eshop::model.ProductDescription')">{{$current->payload()->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-3 offset-md-9">
                                                    <button class="btn btn-primary btn-block" style="zoom: 1.5"
                                                            type="submit">
                                                        @lang('eshop::model.Update')
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
