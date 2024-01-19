<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span>{{Session::get('username')}}</span>
                            <div id="more-details">Admin<i class="fa fa-chevron-down m-l-5"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href=""><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href=""><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="{{url('/logout')}}" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li> 
                    <li class="nav-item">
                        <a href="{{url('/admin')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span><span class="pcoded-mtext">Statistik</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin/data-user')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data User</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{('/admin/data-toko')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Toko</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{('/admin/data-obat')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-circle"></i></span><span class="pcoded-mtext">Data Obat</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{('/admin/data-pembeli')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data Profil Pembeli</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{('/admin/data-penjual')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data Profil Penjual</span></a>
                    </li>

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href=""><span></span></a>
            <a href="" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="assets/images/logo.png" alt="" class="logo">
                <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
            <a href="" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon feather icon-bell"></i>
                            <span class="badge badge-pill badge-danger">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="" class="m-r-10">mark as read</a>
                                    <a href="">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong><?php '$_SESSION["username"]' ?></strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5
                                                    min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10
                                                    min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12
                                                    min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30
                                                    min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-2.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>{{Session::get('username')}}</span>
                                <a href="{{url('/logout')}}" class="dud-logout" title="Logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="">Dashboard Analytics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- jangan dihapus Latest Customers start -->
                <div class="col-lg-12 col-md-12">
                    <div class="card table-card review-card">
                        <div class="card-header borderless ">

                            <h3>Data User</h3>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href=""><span><i class="feather icon-maximize"></i>
                                                    maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                                    Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href=""><span><i class="feather icon-minus"></i>
                                                    collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a>
                                        </li>
                                        <li class="dropdown-item reload-card"><a href=""><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href=""><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="review-block">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body table-border-style">
                                            <h5>Statistik Jumlah User</h5>
                                            <div class="table-responsive">
                                                <table border="1" cellpadding=10 cellspacing=0>
                                                    <thead class="table-dark">
                                                        <th>No</th>
                                                        <th>Role User</th>
                                                        <th>Jumlah</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-info">
                                                                1
                                                            </td>
                                                            <td class="table-success">
                                                                Admin
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahAdmin) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                2
                                                            </td>
                                                            <td class="table-success"> Penjual
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPenjual) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                3
                                                            </td>
                                                            <td class="table-success"> Pembeli
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPembeli) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info" colspan="2" align="center">
                                                                Total
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahAdmin) + count($jumlahPenjual) + count($jumlahPembeli) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-body table-border-style">
                                            <h5>Statistik Data Pesanan</h5>
                                            <div class="table-responsive">
                                                <table border="1" cellpadding=10 cellspacing=0>
                                                    <thead class="table-dark">
                                                        <th>No</th>
                                                        <th>Status</th>
                                                        <th>Jumlah</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-info">
                                                                1
                                                            </td>
                                                            <td class="table-success">
                                                                Add to Cart
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahAddtoCart) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                2
                                                            </td>
                                                            <td class="table-success"> In Order
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahInOrder) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info" colspan="2" align="center">
                                                                Total
                                                            </td>
                                                            <td class="table-warning">
                                                                {{count($jumlahInOrder) + count($jumlahAddtoCart)}}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-body table-border-style">
                                            <h5>Statistik Jumlah User</h5>
                                            <div class="table-responsive">
                                                <table border="1" cellpadding=10 cellspacing=0>
                                                    <thead class="table-dark">
                                                        <th>No</th>
                                                        <th>Role User</th>
                                                        <th>Jumlah</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-info">
                                                                1
                                                            </td>
                                                            <td class="table-success">
                                                                Admin
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahAdmin) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                2
                                                            </td>
                                                            <td class="table-success"> Penjual
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPenjual) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                3
                                                            </td>
                                                            <td class="table-success"> Pembeli
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPembeli) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info" colspan="2" align="center">
                                                                Total
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahUser) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-body table-border-style">
                                            <h5>Statistik Jumlah User</h5>
                                            <div class="table-responsive">
                                                <table border="1" cellpadding=10 cellspacing=0>
                                                    <thead class="table-dark">
                                                        <th>No</th>
                                                        <th>Role User</th>
                                                        <th>Jumlah</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-info">
                                                                1
                                                            </td>
                                                            <td class="table-success">
                                                                Admin
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahAdmin) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                2
                                                            </td>
                                                            <td class="table-success"> Penjual
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPenjual) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info">
                                                                3
                                                            </td>
                                                            <td class="table-success"> Pembeli
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahPembeli) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-info" colspan="2" align="center">
                                                                Total
                                                            </td>
                                                            <td class="table-warning">
                                                                {{ count($jumlahUser) }}
                                                            </td>
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


                    <!-- Latest Customers end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>


        <!-- Required Js -->
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/pcoded.min.js"></script>

        <!-- Apex Chart -->
        <script src="assets/js/plugins/apexcharts.min.js"></script>


        <!-- custom-chart js -->
        <script src="assets/js/pages/dashboard-main.js"></script>
</body>

</html>
