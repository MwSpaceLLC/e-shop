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
                                <form enctype="multipart/form-data" method="post"
                                      id="Product"
                                      action="{{route('eshop-post-model', ['model'=>$m,'current'=>$i=isset($current)?$current->id:null])}}"> @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            @include('eshop::part.model.avatar')
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           value="{{$i?$current->payload()->name:''}}"
                                                           placeholder="@lang('eshop::model.'. $m . 'Name')*"
                                                           required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[price]"
                                                           data-tippy-content="@lang('eshop::model.'. $m . 'PriceTooltip')"
                                                           class="form-control price"
                                                           value="{{$i?$current->payload()->price:''}}"
                                                           placeholder="@lang('eshop::model.'. $m . 'Price')*"
                                                           required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <select id="tax" class="js-states form-control"
                                                            data-placeholder="@lang('eshop::model.'. $m . 'Tax')"
                                                            tabindex="-1"
                                                            data-minimum-results-for-search="Infinity"
                                                            name="tax_id" style="display: none; width: 100%">
                                                        <option value="0">0% / Disabled</option>

                                                        @foreach(eshop()->tax()->all() as $item)
                                                            @if($i && $item->id == $current->tax_id)
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
                                                            data-placeholder="@lang('eshop::model.'. $m . 'Category')"
                                                            tabindex="-1"
                                                            name="category_id[]" style="display: none; width: 100%"
                                                            multiple="multiple">
                                                        @foreach(eshop()->category()->all() as $item)
                                                            @if($i && is_array($current->categories()) && in_array($item->id,$current->categories()))
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
                                                           placeholder="@lang('eshop::model.'. $m . 'Ean')">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <h5>@lang('eshop::model.'. $m . 'Info')</h5>
                                            <div class="row m-2">
                                                <div class="col-md-10 offset-md-1">
                                                    <textarea type="text" name="payload[info]"
                                                              class="form-control"
                                                              rows="3"
                                                              data-placeholder="@lang('eshop::model.'. $m . 'Info')">{{$i?$current->payload()->info:''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="divider"></div>
                                            <h5>@lang('eshop::model.'. $m . 'Description')</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control tiny"
                                                              rows="6"
                                                              data-placeholder="@lang('eshop::model.'. $m . 'Description')">{{$i?$current->payload()->description:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-3 offset-md-9">
                                                    <button class="btn btn-primary btn-block" style="zoom: 1.5"
                                                            type="submit">
                                                        @lang($i?'eshop::model.Update':'eshop::model.Insert')
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
