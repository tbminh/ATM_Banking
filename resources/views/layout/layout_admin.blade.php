
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.cs')}}s">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('public/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('public/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('public/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style type="text/css" media="screen">
        table {
            margin: 5px;
            padding: 0;
            width: 100%;
            table-layout: auto;

        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .10em;
        }

        table th,
        table td {
            padding: .200em;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table th {
            font-size: 12px;
            text-transform: uppercase;
            color: black;font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .6em;
                text-align: right;

            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
                border: 1px solid #ddd;
            }
        }
    </style>
    <style>
        .button3{
            background: blue;
            padding:1.2em 1.4em;
            font-size:10px;
            margin:5px;
            border:none;
            border-radius:5px;
            box-shadow:0 5px gray;
            cursor:pointer;
            outline:none;
        }
        .button3:active{
            transform:translate(0,4px);
            box-shadow:0 2px gray;
        }
    </style>
    <style>
        .button4{
            background: blue;
            padding:1.2em 1.4em;
            font-size:10px;
            margin:5px;
            border:none;
            border-radius:5px;
            box-shadow:0 5px gray;
            cursor:pointer;
            outline:none;
        }
        .button4:active{
            transform:translate(0,4px);
            box-shadow:0 2px gray;
        }
    </style>
    <style>
        .button5{
            background:blue;
            padding:1.2em 1.4em;
            font-size:9px;
            margin:5px;
            border:none;
            border-radius:5px;
            box-shadow:0 5px gray;
            cursor:pointer;
            outline:none;
        }
        .button5:active{
            transform:translate(0,4px);
            box-shadow:0 2px gray;
        }
    </style>
    <style>
        @-webkit-keyframes my {
            0% { color:red; }
            50% { color:  yellow; }
            100% { color:red; }
        }
        {{--  @-moz-keyframes my {
        0% { color: red; }
        50% { color:  yellow; }
        100% { color: red; }
        }  --}}
        @-o-keyframes my {
            0% { color: red; }
            50% { color:  yellow; }
            100% { color: red; }
        }
        @keyframes my {
            0% { color: red; }
            50% { color: yellow; }
            100% { color: red; }
        }
        .test {
            background:white;
            font-size:24px;
            font-weight:bold;
            -webkit-animation: my 700ms infinite;
            -moz-animation: my 700ms infinite;
            -o-animation: my 700ms infinite;
            animation: my 700ms infinite;
        }
    </style>
    <style>
        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('/')}}" class="brand-link">
            <img src="{{ url('public/upload/icon_bank.png') }}" width="30px" height="30px" style="margin-right: 10px;">
            <span class="brand-text font-weight-light">ATM Banking</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            @if (Auth::check())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img style="height: 50px; width: 50px; object-fit: cover;" src="{{url('public/images/admin.png')}}" 
                        class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div style="margin-top: 8px; font-size: 16px" class="info">
                        <a href="#" class="d-block">admin</a>
                    </div>
                </div>
            @endif

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{url('/page-admin/nganhang')}}" class="nav-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <p>
                                Quản lý ngân hàng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/page-admin/phonggiaodich')}}" class="nav-link">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <p>
                                Quản lý phòng giao dịch
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-admin/truatm')}}" class="nav-link">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <p>
                                Quản lý trụ atm
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-admin/theatm')}}" class="nav-link">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <p>
                                Quản lý thẻ atm
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#modelIdlogout">
                            <i class="fa fa-sign-out"></i>
                            <p><b>Đăng xuất</b></p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content_admin')

    <footer class="main-footer"></footer>

    <!-- Modal -->
    <div class="modal fade" id="modelIdlogout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Bạn có muốn đăng xuất không ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    <a href="{{ url('page-admin/logout') }}" class="btn btn-primary">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/dist/js/adminlte.js')}}"></script>
@yield('script')
</body>
</html>
