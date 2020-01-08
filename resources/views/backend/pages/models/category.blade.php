@extends('eshop::backend.layout')

@section('title', $category->payload()->name)

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                @include("eshop::backend.components.headers.category")
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Prodotti Disponibili per <span class="badge badge-info">{{$category->payload()->name}}</span></h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="transaction-table">
                                <div class="table-responsive">
                                    @include("eshop::backend.components.tables.category")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script rel="script" type="application/javascript">
        const catalogoCharts = document.querySelector("#category-chart");
        if (catalogoCharts) {
            var chart = new ApexCharts(catalogoCharts, {
                chart: {
                    type: 'donut'
                },
                series: [
                    catalogoCharts.dataset.product,
                    catalogoCharts.dataset.category,
                    catalogoCharts.dataset.tax,
                    catalogoCharts.dataset.media
                ],
                labels: ['Prodotti', 'Categorie', 'Tasse', 'Media']
            });
            chart.render();
        }
    </script>
@endsection
