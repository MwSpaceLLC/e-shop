@extends('eshop::backend')

@section('title', 'Dashboard')

@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="dashboard-info row">
                                    <div class="info-text col-md-6">
                                        <h5 class="card-title">
                                            @lang('eshop::index.Welcome') {{admin()->email}}!</h5>
                                        <p>@lang('eshop::index.Intro')</p>
                                        <ul>
                                            <li>@lang('eshop::index.Intro1')</li>
                                            <li>@lang('eshop::index.Intro2')</li>
                                            <li>@lang('eshop::index.Intro3')</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 float">
                                        <img src="/vendor/eshop/assets/images/dashboard-info.png" width="250">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">@lang('eshop::index.Visitor')</h5>
                                        <canvas id="visitorsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maintenance Mode -->
                @if(eshop()->option('maintenance'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning m-b-lg" role="alert">
                                @lang('eshop::index.Maintenance')
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::index.Customers')</h5>
                                <h2 class="float-right">45.6K</h2>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"
                                         aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::index.Orders')</h5>
                                <h2 class="float-right">14.3K</h2>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::index.MountProfit')</h5>
                                <h2 class="float-right">45.6$</h2>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%"
                                         aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::index.LatestTransition')</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>0776</td>
                                            <td>Sale Management</td>
                                            <td>$18, 560</td>
                                            <td><span class="badge badge-success">Finished</span></td>
                                        </tr>
                                        <tr>
                                            <td>0759</td>
                                            <td>Dropbox</td>
                                            <td>$40, 672</td>
                                            <td><span class="badge badge-warning">Waiting</span></td>
                                        </tr>
                                        <tr>
                                            <td>0741</td>
                                            <td>Social Media</td>
                                            <td>$13, 378</td>
                                            <td><span class="badge badge-info">In Progress</span></td>
                                        </tr>
                                        <tr>
                                            <td>0740</td>
                                            <td>Envato Market</td>
                                            <td>$17, 456</td>
                                            <td><span class="badge badge-info">In Progress</span></td>
                                        </tr>
                                        <tr>
                                            <td>0735</td>
                                            <td>Graphic Design</td>
                                            <td>$29, 999</td>
                                            <td><span class="badge badge-secondary">Canceled</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::index.LatestComment')</h5>
                                <div class="social-media-list">
                                    <div class="social-media-item">
                                        <div class="social-icon twitter">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                        <div class="social-text">
                                            <p>It’s kind of fun to do the impossible...</p>
                                            <span>4 November, 2019</span>
                                        </div>
                                    </div>
                                    <div class="social-media-item">
                                        <div class="social-icon google">
                                            <i class="fab fa-google-plus-g"></i>
                                        </div>
                                        <div class="social-text">
                                            <p>Sometimes by losing a battle you find a new way to win the war...</p>
                                            <span>26 October, 2019</span>
                                        </div>
                                    </div>
                                    <div class="social-media-item">
                                        <div class="social-icon facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </div>
                                        <div class="social-text">
                                            <p>To improve is to change; to be perfect is to change often...</p>
                                            <span>12 October, 2019</span>
                                        </div>
                                    </div>
                                    <div class="social-media-item">
                                        <div class="social-icon facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </div>
                                        <div class="social-text">
                                            <p>If you're going through hell, keep going...</p>
                                            <span>29 September, 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
{{--    <script src="{{asset('vendor/eshop/assets/js/pages/dashboard.js')}}"></script>--}}
@endsection
