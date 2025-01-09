@extends('admin.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-brown fw-bold">Dashboard {{ Auth::user()->name }}</h1>
</div>

@if (Auth::user()->role_id == '1')
    <!-- Header Content -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-3 border-left-brown-500 border-bottom-brown-500 shadow h-100 py-2 bg-brown">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                Total Pelapor (Korban)</div>
                            <div class="h5 mb-0 font-weight-bold text-light">{{ $total_korban }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-exclamation h2 text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-3 border-left-brown-200 border-bottom-brown-100 shadow h-100 py-2 bg-brown">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                Total Pelapor (Saksi)</div>
                            <div class="h5 mb-0 font-weight-bold text-light">{{ $total_saksi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-raised-hand h2 text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-3 border-left-brown-third border-bottom-brown-third shadow h-100 py-2 bg-brown">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                Total Pengadu</div>
                            <div class="h5 mb-0 font-weight-bold text-light">{{ $total_pengadu }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-text h2 text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 bg-light-brown">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-brown">Kebutuhan Pelapor</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body text-brown">
                    <h4 class="small font-weight-bold">Konseling Psikologis<span class="float-right">{{ round(($konseling_psikologis/$total_pengadu)*100, 2) }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($konseling_psikologis/$total_pengadu)*100 }}%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Konseling Rohani / Spiritual<span class="float-right">{{ round(($konseling_rohani/$total_pengadu)*100, 2) }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:{{ ($konseling_rohani/$total_pengadu)*100 }}%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Bantuan Hukum<span class="float-right">{{round(($bantuan_hukum/$total_pengadu)*100, 2) }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: {{($bantuan_hukum/$total_pengadu)*100 }}%" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Bantuan Medis<span class="float-right">{{ round(($bantuan_medis/$total_pengadu)*100, 2) }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($bantuan_medis/$total_pengadu)*100 }}%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Tidak Membutuhkan Pendampingan<span class="float-right">{{ round(($tidak_butuh/$total_pengadu)*100, 2) }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($tidak_butuh/$total_pengadu)*100 }}%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 bg-light-brown2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-brown">Diagram Pengadu</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="myPieChart"
                                data-chart-data="{{ json_encode($chart_data) }}">
                            </canvas>
                    </div>
                    <div class="mt-4 text-center small bg-light rounded-sm text-brown">
                        <span class="mr-2">
                            <i class="bi bi-circle-fill text-primary"></i> Korban
                        </span>
                        <span class="mr-2">
                            <i class="bi bi-circle-fill text-success"></i> Saksi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@elseif(Auth::user()->role_id == '2')
    Guest
@elseif(Auth::user()->role_id == '3')
    Dokter
@else
    Advokat
@endif

@endsection