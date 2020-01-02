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
                                            @include('eshop::backend.model.avatar')

                                            @if(isset($current->payload()->image))
                                                <a href="{{route('eshop-remove-image-model', ['model'=>$m,'current'=>$current->id])}}"
                                                   onclick="return confirm('@lang('eshop::model.ProductPriceTooltip')')"
                                                   class="btn btn-danger btn-block btn-sm"
                                                   type="submit">
                                                    @lang('eshop::model.RemoveImage')
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           value="{{$current->payload()->name}}"
                                                           placeholder="@lang('eshop::model.ProductName')*" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[price]"
                                                           data-tippy-content="@lang('eshop::model.ProductPriceTooltip')"
                                                           class="form-control price"
                                                           value="{{$current->payload()->price??null}}"
                                                           placeholder="@lang('eshop::model.ProductPrice')">
                                                </div>
                                                <div class="col-md-3">
                                                    <select id="tax" class="js-states form-control"
                                                            data-placeholder="@lang('eshop::model.CategoryTax')"
                                                            tabindex="-1"
                                                            data-minimum-results-for-search="Infinity"
                                                            name="tax_id" style="display: none; width: 100%">
                                                        <option value="0">0% / Disabled</option>

                                                        @foreach(eshop()->tax()->all() as $item)
                                                            @if($item->id == $current->tax_id)
                                                                <option
                                                                    selected=""
                                                                    value="{{$item->id}}">{{$item->payload()->percentage}}
                                                                    / {{$item->payload()->name}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$item->id}}">{{$item->payload()->percentage}}
                                                                    / {{$item->payload()->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="js-states form-control"
                                                            data-placeholder="@lang('eshop::model.ProductCategory')"
                                                            tabindex="-1"
                                                            name="category_id[]" style="display: none; width: 100%"
                                                            multiple="multiple">
                                                        @foreach(eshop()->category()->all() as $item)
                                                            @if(is_array($current->categories()) && in_array($item->id,$current->categories()))
                                                                <option
                                                                    selected=""
                                                                    value="{{$item->id}}">ID {{$item->id}}
                                                                    / {{$item->payload()->name}}</option>
                                                            @else
                                                                <option value="{{$item->id}}">ID {{$item->id}}
                                                                    / {{$item->payload()->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="payload[ean]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.ProductEan')">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <h5>@lang('eshop::model.ProductInfo')</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[info]"
                                                              class="form-control"
                                                              rows="3"
                                                              data-placeholder="@lang('eshop::model.ProductInfo')">{{$current->payload()->info??''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="divider"></div>
                                            <h5>@lang('eshop::model.ProductDescription')</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control tiny"
                                                              rows="6"
                                                              data-placeholder="@lang('eshop::model.ProductDescription')">{{$current->payload()->description??''}}</textarea>
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
