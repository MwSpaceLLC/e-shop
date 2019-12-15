@extends('eshop::app')

@section('title', trans('eshop::model.Insert'). ' '.$m=get_model($model))

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-separator-1">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('eshop-models',['model'=>$m])}}">{{$m}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">@lang('eshop::model.Insert')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <i data-toggle="tooltip" title=""
                                   style="position: absolute;top: 5px;right: 5px"
                                   data-original-title="@lang('eshop::model.Help')"
                                   class="material-icons pointer">help_outline</i>

                                @if($model->insert)
                                    <form method="post" action="{{route('eshop-post-model', ['model'=>$m])}}"> @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="todo-sidebar">
                                                    <div class="todo-new-task">
                                                        <button class="btn btn-primary btn-block" type="submit">
                                                            @lang('eshop::model.CreateNew') {{$m}}
                                                        </button>
                                                    </div>
                                                    <div class="todo-menu">
                                                        <h3></h3>
                                                        <ul class="list-unstyled">
                                                            <li><a href="#!" onclick="addPayload()">
                                                                    <i class="material-icons">
                                                                        add_circle_outline </i>@lang('eshop::model.CreatePayload')
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="divider"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="todo-list">
                                                    <ul class="list-unstyled" id="payload">

                                                        @switch($m)
                                                            @case('User')
                                                            <li class="m-1 bg-light p-2">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="key[]" readonly=""
                                                                               class="form-control"
                                                                               value="email"
                                                                               placeholder="payload_key" required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="email" name="data[]"
                                                                               class="form-control"
                                                                               placeholder="is required in User Model"
                                                                               required="">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @break
                                                            @case('Category')
                                                            <li class="m-1 bg-light p-2">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="key[]" readonly=""
                                                                               class="form-control"
                                                                               value="name"
                                                                               placeholder="payload_key" required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="data[]"
                                                                               class="form-control"
                                                                               placeholder="is required in Category Model"
                                                                               required="">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="m-1 bg-light p-2">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="key[]" readonly=""
                                                                               class="form-control"
                                                                               value="description"
                                                                               placeholder="payload_key" required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="data[]"
                                                                               class="form-control"
                                                                               placeholder="is required in Category Model"
                                                                               required="">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @break
                                                            @default
                                                            <li class="m-1 bg-light p-2">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="key[]"
                                                                               class="form-control"
                                                                               placeholder="payload_key" required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="data[]"
                                                                               class="form-control"
                                                                               placeholder="Payload data" required="">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endswitch
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    Forbidden - U can't insert this module from GUI
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('vendor/eshop/assets/js/custom.js')}}"></script>
@endsection
