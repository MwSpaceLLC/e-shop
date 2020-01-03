@extends('eshop::backend')

@section('title', 'Settings')

@section('css')
    <style>
        hr.endpoint::before {
            content: 'Settings\'s API';
            display: flex;
            align-items: center;
            zoom: 2;
            margin: -17px -17px -17px 17px;
            z-index: 999;
        }
    </style>
@endsection

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

                            <div class="card-body m-0">
                                <h5 class="card-title">Work with eshop Middleware (Required for correct use) </h5>
                                <pre><code class="language-php">Replace as follow in app/Providers/RouteServiceProvider.php:

/**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
*/
    protected function mapWebRoutes()
    {
        Route::middleware([
            'web',
            'MwSpace\Eshop\Http\Middleware\EshopMaintenance',
            'MwSpace\Eshop\Http\Middleware\EshopCookies'
        ])
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }</code></pre>

                            </div>


                        </div>
                    </div>

                    <div class="col-md-3">
                        @include('eshop::part.api.side')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
