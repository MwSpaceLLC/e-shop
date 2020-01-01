@extends('eshop::backend')

@section('title', 'Api')

@section('content')
    <div class="lime-container mt-5 mb-5">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <hr class="option endpoint">

                        <div class="card">

                            <img src="https://image.flaticon.com/icons/svg/718/718064.svg"
                                 class="w-xs mr-3 option" alt="...">

                            @foreach(eshop()->api()->routes() as $route)
                                <div class="card-body m-0">
                                    <h5 class="card-title">{{$route->doc}}</h5>

                                    <pre><b>{{$route->method}}</b> | <code
                                            class="language-md">{{$route->path}}</code></pre>

                                    <pre><code class="language-php">{{$route->action}}</code></pre>

                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-3">
                        @include('eshop::part.apiside')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
