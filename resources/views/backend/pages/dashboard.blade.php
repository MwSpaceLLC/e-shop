@extends('eshop::backend.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-xxl-4">
                    <div class="card balance-widget">
                        <div class="card-header border-0 py-0 mb-5">
                            <h4 class="card-title">Ultimi Prodotti Inseriti </h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="balance-widget">
                                <ul class="list-unstyled">
                                    @foreach(eshop()->product()->orderBy('created_at','desc')->take(4)->get() as $product)
                                        <li class="media">
                                            <i class="fas fa-box m-3"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">{{$product->getPayload('name')}}</h5>
                                            </div>
                                            <div class="text-right">
                                                <span>{{$product->getPayload('price')}} €</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-8 col-xxl-8">
                    <div class="card profile_chart">
                        <div class="card-header py-0">
                            <div class="chart_current_data">
                                <h3>254856 <span>USD</span></h3>
                                <p class="text-success">125648 <span>USD (20%)</span></p>
                            </div>
                            <div class="duration-option">
                                <a id="all" class="active">ALL</a>
                                <a id="one_month" class="">1M</a>
                                <a id="six_months">6M</a>
                                <a id="one_year" class="">1Y</a>
                                <a id="ytd" class="">YTD</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="timeline-chart"></div>
                            <div class="chart-content text-center">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">24hr Volume</p>
                                            <h5>$1236548.325</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Market Cap</p>
                                            <h5>19B USD</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Circulating Supply</p>
                                            <h5>29.4M BTC</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">All Time High</p>
                                            <h5>19.783.06 USD</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Typical hold time </p>
                                            <h5>88 days</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Trading activity </p>
                                            <h5>70% buy </h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Popularity </p>
                                            <h5>#1 most held </h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-6">
                                        <div class="chart-stat">
                                            <p class="mb-1">Popularity </p>
                                            <h5>#1 most held </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header border-0 py-0">
                            <h4 class="card-title">Ultime Categorie Inseriti </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach(eshop()->category()->orderBy('created_at','desc')->take(4)->get() as $category)
                                    <div class="col-xl-12 col-lg-6 col-xxl-6">
                                        <div class="widget-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="widget-stat">
                                                    <div class="coin-title">
                                                        <span><i class="far fa-hdd"></i></span>
                                                        <h5 class="d-inline-block ml-2 mb-3">{{$category->getPayload('name')}}</h5>
                                                    </div>
                                                    <h4>{{$category->tax()->first()->getPayload('name')}} <span class="badge badge-warning ml-2 text-white">{{$category->tax()->first()->getPayload('rate')}}</span>
                                                    </h4>
                                                </div>
                                                <div id="dashChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-xxl-4">
                    <div class="card">
                        <div class="card-header border-0 py-0">
                            <h4 class="card-title">Exchange</h4>
                        </div>
                        <div class="card-body">
                            <div class="buy-sell-widget">
                                <form method="post" name="myform" class="currency_validate">
                                    <div class="form-group">
                                        <label class="mr-sm-2">Currency</label>
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                                <option value="litecoin">Litecoin</option>
                                            </select>
                                            <input type="text" name="usd_amount" class="form-control"
                                                   value="125.00 USD">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mr-sm-2">Payment Method</label>
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                                <option value="litecoin">Litecoin</option>
                                            </select>
                                            <input type="text" name="usd_amount" class="form-control"
                                                   value="125.00 USD">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mr-sm-2">Enter your amount</label>
                                        <div class="input-group">
                                            <input type="text" name="currency_amount" class="form-control"
                                                   placeholder="0.0214 BTC">
                                            <input type="text" name="usd_amount" class="form-control"
                                                   placeholder="125.00 USD">
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <p class="mb-0">Monthly Limit</p>
                                            <h6 class="mb-0">$49750 remaining</h6>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-block">Exchange
                                        Now
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-xxl-8">
                    <div class="card">
                        <div class="card-header border-0 py-0">
                            <h4 class="card-title">Recent Activities</h4>
                            <a href="#">View More </a>
                        </div>
                        <div class="card-body">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-responsive-sm">
                                        <tbody>
                                        <tr>
                                            <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                            </td>

                                            <td>
                                                <span class="badge badge-danger">Sold</span>
                                            </td>
                                            <td>
                                                <i class="cc BTC"></i> Bitcoin
                                            </td>
                                            <td>
                                                Using - Bank *******5264
                                            </td>
                                            <td class="text-danger">-0.000242 BTC</td>
                                            <td>-0.125 USD</td>
                                        </tr>
                                        <tr>
                                            <td><span class="buy-thumb"><i class="la la-arrow-up"></i></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Buy</span>
                                            </td>
                                            <td>
                                                <i class="cc LTC"></i> Litecoin
                                            </td>
                                            <td>
                                                Using - Card *******8475
                                            </td>
                                            <td class="text-success">-0.000242 BTC</td>
                                            <td>-0.125 USD</td>
                                        </tr>
                                        <tr>
                                            <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">Sold</span>
                                            </td>
                                            <td>
                                                <i class="cc XRP"></i> Ripple
                                            </td>
                                            <td>
                                                Using - Card *******8475
                                            </td>
                                            <td class="text-danger">-0.000242 BTC</td>
                                            <td>-0.125 USD</td>
                                        </tr>
                                        <tr>
                                            <td><span class="buy-thumb"><i class="la la-arrow-up"></i></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Buy</span>
                                            </td>
                                            <td>
                                                <i class="cc DASH"></i> Dash
                                            </td>
                                            <td>
                                                Using - Card *******2321
                                            </td>
                                            <td class="text-success">-0.000242 BTC</td>
                                            <td>-0.125 USD</td>
                                        </tr>
                                        <tr>
                                            <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">Sold</span>
                                            </td>
                                            <td>
                                                <i class="cc BTC"></i> Bitcoin
                                            </td>
                                            <td>
                                                Using - Card *******2321
                                            </td>
                                            <td class="text-danger">-0.000242 BTC</td>
                                            <td>-0.125 USD</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
