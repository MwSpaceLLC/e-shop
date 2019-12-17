@extends('eshop::app')

@section('title', trans('eshop::model.Insert'). ' '.$m=get_model($model))

@section('css')
    <link href="{{asset('vendor/eshop/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <style>
        span.select2-selection, .select2-selection.select2-selection--multiple {
            padding: 5px !important;
            font-size: 1rem !important;
            line-height: 0.8 !important;
            box-shadow: 0 3px 10px rgba(62, 85, 120, .045) !important;
            zoom: 1.5;
        }

        .tox-notifications-container {
            display: none;
        }

        .tox-tinymce {
            border: 2px solid #e6e6e6;
            border-radius: 4px;
            box-shadow: 0 3px 10px rgba(62, 85, 120, .045) !important;
        }

    </style>
@endsection

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
                                <form enctype="multipart/form-data" method="post"
                                      id="Product"
                                      action="{{route('eshop-post-model', ['model'=>$m])}}"> @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="todo-sidebar">
                                                <div class="todo-new-task">
                                                    <button class="btn btn-primary btn-block" style="zoom: 1.5"
                                                            type="submit">
                                                        @lang('eshop::model.CreateNew')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" style="zoom: 1.5" name="payload[name]"
                                                           class="form-control"
                                                           placeholder="Product Name*" required="">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" style="zoom: 1.5" name="payload[price]"
                                                           class="form-control"
                                                           placeholder="Product Price">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="js-states form-control" tabindex="-1"
                                                            name="category_id" style="display: none; width: 100%"
                                                            multiple="multiple">
                                                        @foreach(eshop()->category->all() as $item)
                                                            <option
                                                                value="{{$item->id}}">{{$item->payload()->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" style="zoom: 1.5" name="payload[price]"
                                                           class="form-control"
                                                           placeholder="Product EAN Code">
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" name="payload[description]"
                                                              class="form-control"
                                                              rows="6"
                                                              placeholder="Product Name"></textarea>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <input type="file" class="my-pond" name="filepond"/>
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
    <script src="{{asset('vendor/eshop/assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>
        $('select').select2({
            placeholder: "Select Category"
        });
        tinymce.init({
            selector: 'textarea',
            height: "380"
        });

        // First register any plugins
        $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

        // Turn input element into a pond
        $('.my-pond').filepond();

        // Set allowMultiple property to true
        $('.my-pond').filepond('allowMultiple', true);

        // Listen for addfile event
        $('.my-pond').on('FilePond:addfile', function (e) {
            console.log('file added event', e);
        });

        // Manually add a file using the addfile method
        $('.my-pond').first().filepond('addFile', 'index.html').then(function (file) {
            console.log('file added', file);
        });

    </script>
@endsection
