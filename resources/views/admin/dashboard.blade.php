@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Welcome!</li>
                    </ol>
                </div>
                <h4 class="page-title">Welcome!</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-dark">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-file-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Client Project</h6>
                    <h2 class="my-2">{{$totalProject}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-money-dollar-circle-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Amount</h6>
                    <h2 class="my-2">{{$totalProjectAmount}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-primary">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-money-dollar-circle-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Income</h6>
                    <h2 class="my-2">{{$totalProjectIncome}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-danger">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-money-dollar-circle-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Due</h6>
                    <h2 class="my-2">{{$totalProjectDue}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-success">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-box-3-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Products">Total Products</h6>
                    <h2 class="my-2">{{ $totalProduct }}</h2>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-warning">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-shopping-cart-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Requests">Product Requests</h6>
                    <h2 class="my-2">{{ $totalProductRequest }}</h2>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-info">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-mail-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Contacts">Contact Requests</h6>
                    <h2 class="my-2">{{ $totalContactRequest }}</h2>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-secondary">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-user-add-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Applications">Job Applications</h6>
                    <h2 class="my-2">{{ $totalJobApplication }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Project Payment Chart</h4>
                    <div style="width: 380px;height:380px; margin: 0 auto;">
                        <canvas id="doughnut"></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('doughnut').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: @json($data['labels']),
                                datasets: [{
                                    data: @json($data['value']),
                                    backgroundColor: [
                                        'rgba(153, 102, 255, 0.7)',
                                        'rgba(75, 192, 192, 0.7)',
                                        'rgba(219, 55, 0, 0.7)',




                                    ],
                                    borderColor: [
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(219, 55, 0, 1)',



                                    ],
                                    borderWidth: 1
                                }]
                            },
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Project Overview Chart</h4>
                    <div class="text-center">
                        <div id="bars_basic" style="width: 600px;height:380px; margin: 0 auto;"></div>
                    </div>
                    <script type="text/javascript">
                        var bars_basic_element = document.getElementById('bars_basic');
                        if (bars_basic_element) {
                            var bars_basic = echarts.init(bars_basic_element);
                            bars_basic.setOption({
                                tooltip: {
                                    trigger: 'axis',
                                    axisPointer: {
                                        type: 'shadow'
                                    }
                                },
                                xAxis: {
                                    type: 'category',
                                    data: ['Total Project', 'Complete', 'Ongoing']
                                },
                                yAxis: {
                                    type: 'value'
                                },
                                series: [
                                    {
                                        type: 'bar',
                                        data: [
                                            { value: {{$totalProject}}, itemStyle: { color: 'rgb(0, 0, 0)' } },        // Black
                                            { value: {{$completeProject}}, itemStyle: { color: 'rgb(59, 192, 195)' } },    // Green
                                            { value: {{$ongoingProject}}, itemStyle: { color: 'rgb(219, 55, 0)' } }     // #db3700
                                        ]
                                    }
                                ]
                            });
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>


@endsection
