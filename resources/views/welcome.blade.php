@extends('layouts.app')

@section('page_css')

@endsection

@section('content')

<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text"
                    id="search-txt"
                    class="form-control bg-light border-0 small search-txt"
                    placeholder="ID de la Gasolineria..."
                    aria-label="Search"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary search-btn" type="button" id="search-btn">
                    <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text"
                        class="form-control bg-light border-0 small search-txt"
                        placeholder="ID de la Gasolineria..."
                        aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-primary search-btn" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                    </div>
                </div>
                </form>
            </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Regular</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$ <span id="regular_price">0.0</span></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Premium</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$ <span id="premium_price">0.0</span></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Diesel</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ <span id="diesel_price">0.0</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Información -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Información</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th><span id="place_id"></span></th>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th><span id="name"></span></th>
                                </tr>
                                <tr>
                                    <th>CRE ID</th>
                                    <th><span id="cre_id"></span></th>
                                </tr>
                                <tr>
                                    <th>Latitud</th>
                                    <th><span id="latitud"></span></th>
                                </tr>
                                <tr>
                                    <th>Longitud</th>
                                    <th><span id="longitud"></span></th>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <th><span id="direccion"></span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Ubicación -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Ubicación</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="map-box">
                            <div id="div-ifrm-map" style="width: 100%">
                                <iframe id="ifrm-map" 
                                    width="100%" height="300" 
                                    frameborder="0" scrolling="no" 
                                    marginheight="0" marginwidth="0" 
                                    src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=es&amp;q=M%C3%A9xico+(Sr%20Pago)&amp;t=&amp;z=4&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Mapa completo -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Mapa Completo</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="map-box">
                            <div id="map" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <ul id="ProfileList">

            </ul>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection

@section('page_js')

@endsection