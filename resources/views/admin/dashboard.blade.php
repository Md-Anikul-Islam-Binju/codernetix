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
            <div class="card widget-flat text-bg-pink">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-app-store-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Project</h6>
                    <h2 class="my-2">{{$totalProject}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-profile-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Amount</h6>
                    <h2 class="my-2">{{$totalProjectAmount}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-info">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-route-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Income</h6>
                    <h2 class="my-2">{{$totalProjectIncome}}</h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-primary">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-file-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Due</h6>
                    <h2 class="my-2">{{$totalProjectDue}}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
