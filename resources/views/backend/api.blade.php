@extends('eshop::backend')

@section('title', 'Api')

@section('content')
    <div class="lime-container mt-5 mb-5">
        <div class="lime-body">
            <div class="container">

                <hr class="option endpoint">
                <!-- Stripe endpoint -->
                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.ApiDoc')</h5>
                                <img src="https://image.flaticon.com/icons/svg/718/718064.svg"
                                     class="w-xs mr-3 option" alt="...">

                                @foreach(eshop()->api()->routes() as $route)
                                    <pre><code class="language-md">{!! $route->method !!}</code></pre>

                                    <pre><code class="language-md">{!! $route->path !!}</code></pre>

                                    <pre><code class="language-php">{!! $route->action !!}</code></pre>
                                @endforeach

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
