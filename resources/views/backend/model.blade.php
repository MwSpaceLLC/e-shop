@extends('eshop::app')

@section('title', ucfirst($m=get_model($model)))

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container-fluid">
                <div class="row">

                    <!-- Model Loops -->
                    <div class="col-lg-8 offset-lg-2">
                        @if($model->insert)
                            <ol class="breadcrumb"
                                style=" display: flex; justify-content: flex-end;background: white; ">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{route('eshop-model-insert', ['model'=>$m])}}"
                                       class="btn btn-primary btn-block">@lang('eshop::model.Add') {{$m}}</a>
                                </li>
                            </ol>
                        @endif
                        <div class="card card-transparent file-list recent-files">
                            <div class="card-body">
                                <div class="row" id="sortable">
                                    @forelse($model->all() as $row)
                                        <div class="col-lg-6 col-xl-3">
                                            <div
                                                class="card folder">
                                                <div class="file-options dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">View Details</a>
                                                        <a class="dropdown-item" href="#">Mark as Important</a>
                                                        <a class="dropdown-item" href="#">Move To</a>
                                                        <a class="dropdown-item" href="#">Copy To</a>
                                                        <a class="dropdown-item" href="#">Rename</a>
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <div class="divider"></div>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="folder-icon">
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
                                                    </div>
                                                    <div class="folder-info">
                                                        <a href="#">{{$row->payload()->name??'name not in payload'}}</a>
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
                console.log(e)
            },
        });
    </script>
@endsection
