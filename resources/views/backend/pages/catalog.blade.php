@extends('eshop::backend.layout')

@section('title', 'Catalogo')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                @include("eshop::backend.components.headers.catalog")
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Categorie Disponibili</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    @include("eshop::backend.components.tables.catalog")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script rel="script" type="application/javascript">
        const catalogoCharts = document.querySelector("#catalogue-chart");
        if (catalogoCharts) {
            var chart = new ApexCharts(catalogoCharts,
                {
                    series: [
                        catalogoCharts.dataset.product,
                        catalogoCharts.dataset.category,
                        catalogoCharts.dataset.tax,
                        catalogoCharts.dataset.media
                    ],
                    chart: {
                        height: 390,
                        type: 'radialBar',
                    },
                    plotOptions: {
                        radialBar: {
                            offsetY: 0,
                            startAngle: 0,
                            endAngle: 270,
                            hollow: {
                                margin: 5,
                                size: '30%',
                                background: 'transparent',
                                image: undefined,
                            },
                            dataLabels: {
                                name: {
                                    show: false,
                                },
                                value: {
                                    show: false,
                                }
                            }
                        }
                    },
                    colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
                    labels: ['Prodotti', 'Categorie', 'Tasse', 'Media'],
                    legend: {
                        show: true,
                        floating: true,
                        fontSize: '16px',
                        position: 'left',
                        offsetX: 70,
                        offsetY: 10,
                        labels: {
                            useSeriesColors: true,
                        },
                        markers: {
                            size: 0
                        },
                        formatter: function (seriesName, opts) {
                            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                        },
                        itemMargin: {
                            horizontal: 3,
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                show: false
                            }
                        }
                    }]
                }
            );
            chart.render();
        }
    </script>
@endsection
