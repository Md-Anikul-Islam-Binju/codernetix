<!DOCTYPE html>
<html lang="en">
@php
    $siteSetting = DB::table('site_settings')->first();
@endphp
<head>
    <meta charset="utf-8" />
    <title>Dashboard | CoderNetix</title>
    <link rel="shortcut icon" href="{{$siteSetting? $siteSetting->favicon:''}}">
    <meta property="og:image" content="{{$siteSetting? $siteSetting->site_preview_image:''}}"/>
    <!-- Select2 css -->
    <link href="{{asset('backend/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
    <!-- Datatables css -->
    <link href="{{asset('backend/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css" />
    <link href="{{asset('backend/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css" />
    <link href="{{asset('backend/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css" />
    <link href="{{asset('backend/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css" />
    <link href="{{asset('backend/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css" />
    <link rel="stylesheet" href="{{asset('backend/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">
    <script src="{{asset('backend/js/config.js')}}"></script>
    <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">
    <div class="navbar-custom">
        <div class="topbar container-fluid">
            <div class="d-flex align-items-center gap-1">
                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
            <ul class="topbar-menu d-flex align-items-center gap-3">
                <li class="dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="ri-search-line fs-22"></i>
                    </a>
                </li>
                <li class="d-none d-sm-inline-block">
                    <div class="nav-link" id="light-dark-mode">
                        <i class="ri-moon-line fs-22"></i>
                    </div>
                </li>
                <li class="dropdown">
                    @php
                        $admin = auth()->user();
                    @endphp
                    <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <span class="d-lg-block d-none">
                              <h5 class="my-0 fw-normal">{{$admin->name}}
                                  <i class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i>
                              </h5>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a href="#" class="dropdown-item">
                            <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                            <span>My Account</span>
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="leftside-menu">
        <a href="{{route('dashboard')}}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{asset($siteSetting->logo)}}" alt="logo" style="height: 50px;">
            </span>
            <span class="logo-sm">
                <img src="{{asset($siteSetting->logo)}}" alt="small logo">
            </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <ul class="side-nav">
                <li class="side-nav-title">Main</li>
                <li class="side-nav-item">
                    <a href="{{route('dashboard')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('slider.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Slider </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('technology.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Technology </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('client.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Client </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('service.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Service </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('team.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Team </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{route('project.section')}}" class="side-nav-link">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Project </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesInventory" aria-expanded="false" aria-controls="sidebarPagesInventory" class="side-nav-link">
                        <i class="ri-pages-line"></i>
                        <span> Inventory </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPagesInventory">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('project.category.section')}}">Project Category</a>
                            </li>
                            <li>
                                <a href="{{route('project.history.section')}}">Project Income History</a>
                            </li>

                            <li>
                                <a href="{{route('expense.category.section')}}">Expense Category</a>
                            </li>

                            <li>
                                <a href="{{route('expense.section')}}">Expense History</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesProduct" aria-expanded="false" aria-controls="sidebarPagesProduct" class="side-nav-link">
                        <i class="ri-pages-line"></i>
                        <span>Ready Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPagesProduct">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('product.category.section')}}">Product Category</a>
                            </li>
                            <li>
                                <a href="{{route('product.section')}}">Product</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                        <i class="ri-pages-line"></i>
                        <span> Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPages">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('site.setting')}}">Site</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @yield('admin_content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>document.write(new Date().getFullYear())</script> © Powered By CoderNetix</b>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('backend/js/vendor.min.js')}}"></script>
<!-- Dropzone File Upload js -->
<script src="{{asset('backend/vendor/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('backend/js/pages/fileupload.init.js')}}"></script>
<!--  Select2 Plugin Js -->
<script src="{{asset('backend/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('backend/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Ckeditor Here -->
<script src="{{asset('backend/js/sdmg.ckeditor.js')}}"></script>
<!-- Datatables js -->
<script src="{{asset('backend/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<!-- Datatable Demo Aapp js -->
<script src="{{asset('backend/js/pages/datatable.init.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
<script src="{{asset('backend/js/app.min.js')}}"></script>

<script src="{{asset('backend/js/summernote-bs5.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Initialize Summernote for the main textarea
        $('#summernote').summernote({
            height: 200,
        });

        $('#summernotelong').summernote({
            height: 200,
        });

        // Initialize Summernote for edit modals
        $('[id^=summernoteEdit]').each(function () {
            $(this).summernote({
                height: 200,
            });
        });
        // Initialize Summernote for edit modals
        $('[id^=summernoteEditLong]').each(function () {
            $(this).summernote({
                height: 200,
            });
        });

    });
</script>
</body>
</html>
