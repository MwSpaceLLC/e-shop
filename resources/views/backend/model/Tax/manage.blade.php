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
                                      action="{{route('eshop-post-model', ['model'=>$m,'current'=>$i=isset($current)?$current->id:null])}}"> @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="https://image.flaticon.com/icons/svg/584/584057.svg" width="100%">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[name]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.'. $m . 'Name')*"
                                                           required=""
                                                           value="{{$i?$current->payload()->name:null}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="payload[country]"
                                                           class="form-control"
                                                           placeholder="@lang('eshop::model.'. $m . 'Country')"
                                                           value="{{$i?$current->payload()->country:null}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="payload[percentage]"
                                                           class="form-control tax"
                                                           placeholder="@lang('eshop::model.'. $m . 'Percentage')"
                                                           value="{{$i?$current->payload()->percentage:null}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <select id="tax" class="js-states form-control"
                                                            data-placeholder="@lang('eshop::model.'. $m . 'Change')"
                                                            tabindex="-1"
                                                            data-minimum-results-for-search="Infinity"
                                                            name="payload[change]" style="display: none; width: 100%">
                                                        <option
                                                            {{$i?$current->payload()->change === 'including'?'selected':'':null}} value="including">@lang('eshop::model.'. $m . 'Incluse')</option>
                                                        <option
                                                            {{$i?$current->payload()->change === 'excluding'?'selected':'':null}} value="excluding">@lang('eshop::model.'. $m . 'Excluse')</option>

                                                    </select>
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
