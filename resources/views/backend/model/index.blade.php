@extends('eshop::app')

@section('title', ucfirst($m=get_model($model)))

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container-fluid">
                <div class="row">

                    <!-- Model Loops -->
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">

                            <div class="col" aria-current="page">
                                <h2>
                                    @if(request()->parent)
                                        <a href="{{route('eshop-models', $m)}}">{{$m}}</a> / <span
                                            class="text-danger">{{get_parent($model)->payload()->name??''}}</span>
                                    @else
                                        {{$m}}
                                    @endif
                                </h2>
                            </div>

                            @if($model->insert)
                                <div class="col-md-2" aria-current="page">
                                    <a href="{{route('eshop-model-insert', ['model'=>$m])}}"
                                       class="btn btn-primary btn-block">@lang('eshop::model.Add') {{$m}}</a>
                                </div>
                            @endif
                        </div>
                        <div class="card card-transparent file-list recent-files">
                            <div class="card-body">
                                <div class="row" id="sortable">
                                    @forelse(loop_model($model) as $row)
                                        <div class="col-lg-6 col-xl-3">
                                            <div
                                                class="card folder">
                                                <div class="file-options dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">@lang('eshop::model.Edit')</a>
                                                        <a class="dropdown-item" href="#">Move To</a>
                                                        <a class="dropdown-item" href="#">Copy To</a>
                                                        <a class="dropdown-item" href="#">Rename</a>
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <div class="divider"></div>
                                                        <a class="dropdown-item text-danger"
                                                           href="{{route('eshop-delete-model',['model'=>$m,'id'=>$row->id])}}"
                                                           onclick="return confirm('{{trans('eshop::model.DeleteAlert')}}')">@lang('eshop::model.Delete')</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="folder-icon">
                                                        @if(isset($row->payload()->image))
                                                            <img src="{{$row->payload()->image}}" width="50">
                                                        @else
                                                            <i class="material-icons">
                                                                @switch($m)
                                                                    @case('Category')
                                                                    folder_open
                                                                    @break
                                                                    @case('Product')
                                                                    shopping_basket
                                                                    @break
                                                                @endswitch
                                                            </i>
                                                        @endif
                                                    </div>
                                                    <div class="folder-info">
                                                        @switch($m)
                                                            @case('Category')
                                                            <a href="{{route('eshop-parent-models',['model'=>$m,'parent'=>$row->id])}}">{{$row->payload()->name??'name not in payload'}}</a>
                                                            @break
                                                            @case('Product')
                                                            <span>{{$row->payload()->name??'name not in payload'}}</span>
                                                            @break
                                                        @endswitch

                                                        <span>{{$row->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <div class="card bg-info text-white">
                                                <div class="card-body">
                                                    <div class="upgrade-info row">
                                                        <div class="upgrade-text col-md-6">
                                                            <h5 class="card-title">
                                                                @lang('eshop::model.Empty')
                                                            </h5>
                                                        </div>
                                                        <div class="upgrade-image col-md-6"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        Sortable.create(sortable, {
            onUpdate: e => {
                axios.get('/user').then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                })
            },
        });
    </script>
@endsection
