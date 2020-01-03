@extends('eshop::backend')

@section('title', ucfirst($m=eshop()->blade()->model($model)))

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
                                    <a href="{{route('eshop-models', $m)}}">{{$m}}</a>

                                    @foreach(eshop()->category()->reverse() as $parent)
                                        / <span class="text-danger">
                                                <a href="{{route('eshop-models', ['model'=>$m,'parent'=>$parent->id])}}">{{$parent->payload()->name}}</a>
                                            </span> /
                                    @endforeach

                                    <span class="text-default">
                                        {{request()->parent? eshop()->blade()->current($model)->payload()->name: null}}
                                    </span>
                                </h2>
                            </div>

                            @if($model->insert)
                                <div class="col-md-2" aria-current="page">
                                    <a href="{{route('eshop-model-insert', ['model'=>$m, 'parent' => request()->parent?? null])}}"
                                       class="btn btn-primary btn-block">@lang('eshop::model.Add') {{$m}}</a>
                                </div>
                            @endif

                        </div>
                        <div class="card card-transparent file-list recent-files">
                            <div class="card-body">
                                <div class="row" id="model_sortable"
                                     data-success="@lang('eshop::model.SortableSuccess')"
                                     data-path="{{route('eshop-update-position-model',$m)}}">
                                    @forelse(eshop()->blade()->loop($model) as $row)
                                        <div id="{{$row->id}}" data-id="{{$row->id}}" class="col-lg-6 col-xl-4">

                                            @include('eshop::part.model.badge')

                                            <div class="card folder">
                                                <div class="file-options dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @include('eshop::part.model.deopdown')
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @include('eshop::part.model.card')
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
                                                        <div class="upgrade-image col-md-6 float"></div>
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
        var sortable = document.getElementById('model_sortable');
        if (sortable)
            Sortable.create(sortable, {
                onUpdate: e => {
                    console.log(e.item.id)
                    console.log(e.oldIndex)
                    console.log(e.newIndex)

                    axios.get(`${sortable.dataset.path}/${e.item.id}/${e.oldIndex}/${e.newIndex}`).then(function (response) {
                        if (response.data.success) {
                            toastr.info(sortable.dataset.success)
                        }
                    }).catch(function (error) {
                        toastr.error('Have error (f12 => console)');
                        console.log(error);
                    })
                },
            });
    </script>
@endsection
