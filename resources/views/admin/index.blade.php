@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
@stop

@section('content_header')
    <h1>Panel Administrativo</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Actividad de registros en los últimos seis meses</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 331px;"
                                width="331" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Distribución de Stock por Producto</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 331px;"
                                width="331" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Line Chart</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="lineChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 331px;"
                            width="331" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Polar area</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="polarChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 331px;"
                                width="331" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">Area Chart</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="areaChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 331px;"
                                width="331" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var countsData = @json($counts);

        function getLastSixMonths() {
            var months = [];
            var currentDate = new Date();

            for (var i = 5; i >= 0; i--) {
                var month = currentDate.getMonth() - i;
                var year = currentDate.getFullYear();

                if (month < 0) {
                    month += 12;
                    year -= 1;
                }

                months.push(year + '-' + ('0' + (month + 1)).slice(-2));
            }

            return months;
        }

        function fillZeros(data, orderedMonths) {
            var zeroFilledData = {};

            for (var i = 0; i < orderedMonths.length; i++) {
                zeroFilledData[orderedMonths[i]] = data[orderedMonths[i]] || 0;
            }

            return zeroFilledData;
        }

        var lastSixMonths = getLastSixMonths();

        userCounts = fillZeros(countsData.userCounts, lastSixMonths);
        productCounts = fillZeros(countsData.productCounts, lastSixMonths);
        supplierCounts = fillZeros(countsData.supplierCounts, lastSixMonths);

        var config = {
            type: 'bar',
            data: {
                labels: lastSixMonths,
                datasets: [{
                        label: 'Usuarios',
                        data: Object.values(userCounts),
                        backgroundColor: 'rgba(75, 192, 192, 0.8)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Productos',
                        data: Object.values(productCounts),
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Vendedores',
                        data: Object.values(supplierCounts),
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        };

        var ctx = document.getElementById('barChart').getContext('2d');
        var myBarChart = new Chart(ctx, config);
    </script>

    <script>
        var distributionsData = @json($distributionsData);

        var productForDistributions = distributionsData.productForDistributions;
        var stockForDistributions = distributionsData.stockForDistributions;

        function generateDynamicColors(count) {
            var dynamicColors = [];
            for (var i = 0; i < count; i++) {
                var hue = (i * 137.508) % 360;
                dynamicColors.push('hsl(' + hue + ', 70%, 50%)');
            }
            return dynamicColors;
        }

        var config = {
            type: 'doughnut',
            data: {
                labels: productForDistributions,
                datasets: [{
                    data: stockForDistributions,
                    backgroundColor: generateDynamicColors(productForDistributions.length),
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        };

        var ctx = document.getElementById('donutChart').getContext('2d');
        var myDonutChart = new Chart(ctx, config);
    </script>

    <script>
        var salesData = {!! json_encode($salesData) !!};

        function generateDynamicColors(count) {
            var dynamicColors = [];
            for (var i = 0; i < count; i++) {
                var hue = (i * 137.508) % 360;
                dynamicColors.push('hsl(' + hue + ', 70%, 50%)');
            }
            return dynamicColors;
        }

        var config = {
            type: 'polarArea',
            data: {
                labels: salesData.map(item => item.distribution_name),
                datasets: [{
                    label: 'Ventas por Distribución',
                    data: salesData.map(item => item.sales_count),
                    backgroundColor: generateDynamicColors(salesData.length),
                    borderColor: generateDynamicColors(salesData.length),
                    borderWidth: 1
                }]
            },
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        };

        var ctx = document.getElementById('polarChart').getContext('2d');
        var polarChart = new Chart(ctx, config);
    </script>
@stop