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
                                      id="Category"
                                      action="{{route('eshop-post-model', ['model'=>$m,'current'=>$i=isset($current)?$current->id:null])}}"> @csrf

                                    <div class="row">
                                        <div class="col-md-3">
                                            @include('eshop::part.model.avatar')
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.'. $m . 'Name')*"
                                                           required="" value="{{$i?$current->payload()->name:null}}">
                                                </div>
                                                <div class="col-md-4">
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
                                                            data-placeholder="@lang('eshop::model.'. $m . 'Status')"
                                                            tabindex="-1"
                                                            data-minimum-results-for-search="Infinity"
                                                            name="payload[status]" style="display: none; width: 100%">

                                                        <option {{$i && isset($current->payload()->status) && $current->payload()->status === 'true'?'selected':null}}
                                                            value="true">@lang('eshop::model.'. $m . 'StatusEnable')</option>

                                                        <option {{$i && isset($current->payload()->status) && $current->payload()->status === 'true'?null:'selected'}}
                                                            value="false">@lang('eshop::model.'. $m . 'StatusDisable')</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="category" class="js-states form-control"
                                                            data-placeholder="@lang('eshop::model.'. $m . 'Tax')"
                                                            tabindex="-1"
                                                            name="parent_id" style="display: none; width: 100%"
                                                            data-minimum-results-for-search="Infinity">
                                                        <option value="0">ID: 0 / Home</option>

                                                        @foreach(eshop()->category()->all() as $item)
                                                            @if($i && $item->id !== $current->id)
                                                                @if($item->id == $current->parent_id)
                                                                    <option
                                                                        selected=""
                                                                        value="{{$item->id}}">ID {{$item->id}}
                                                                        / {{$item->payload()->name}}</option>
                                                                @else
                                                                    <option value="{{$item->id}}">ID {{$item->id}}
                                                                        / {{$item->payload()->name}}</option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control"
                                                              rows="6"
                                                              data-placeholder="@lang('eshop::model.'. $m . 'Description')">{{$i?$current->payload()->name:null}}</textarea>
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
