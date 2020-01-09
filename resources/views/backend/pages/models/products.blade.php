@extends('eshop::backend.layout')

@section('title', $category->payload()->name)

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                @include("eshop::backend.components.headers.products")
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Prodotti Disponibili per <span
                                    class="badge badge-info">{{$category->payload()->name}}</span></h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    @include("eshop::backend.components.tables.products")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script rel="script" type="application/javascript">
        const catalogoCharts = document.querySelector("#products-chart");
        if (catalogoCharts) {
            var chart = new ApexCharts(catalogoCharts, {
                series: [
                    catalogoCharts.dataset.cart,
                    catalogoCharts.dataset.payment,
                    catalogoCharts.dataset.order,
                    catalogoCharts.dataset.shipping
                ],
                chart: {
                    height: 350,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Totale',
                                formatter: function (w) {
                                    // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                    return 249
                                }
                            }
                        }
                    }
                },
                labels: ['Carrelli', 'Pagamenti', 'Ordini', 'Spedizioni'],
            });
            chart.render();
        }
    </script>
@endsection
