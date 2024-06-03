@extends('welcome')
@section('judul')
    Dashboard | Halaman Utama
@endsection

@section('konten')
    <h1 class="h3 mb-3">Dashboard | Halaman Utama</h1>
    <div class="row">
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card illustration flex-fill">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-6">
                            <div class="illustration-text p-3 m-1">
                                <h4 class="illustration-text">Welcome Back, Admin!</h4>
                                <p class="mb-0">SIANTA Dashboard</p>
                            </div>
                        </div>
                        <div class="col-6 align-self-end text-end">
                            <img src="img/illustrations/dash2.svg" alt="Photo Dashboard" class="img-fluid illustration-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">700 Siswa</h3>
                            <p class="mb-2">Jumlah Peserta Didik</p>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-success" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">43 Pegawai</h3>
                            <p class="mb-2">Jumlah Pegawai</p>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-danger" data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">14 Ruang</h3>
                            <p class="mb-2">Jumlah Ruang Kelas</p>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-info" data-feather="sidebar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown position-relative">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Grafik Siswa (Tahun)</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown position-relative">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Grafik Siswa (Jenis Kelamin)</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-lg-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <span class="badge bg-info float-end">Today</span>
                    <h5 class="card-title mb-0">Daily feed</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle me-2"
                            alt="Ashley Briggs">
                        <div class="flex-grow-1">
                            <small class="float-end">5m ago</small>
                            <strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong><br />
                            <small class="text-muted">Today 7:51 pm</small><br />

                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2"
                            alt="Chris Wood">
                        <div class="flex-grow-1">
                            <small class="float-end">30m ago</small>
                            <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br />
                            <small class="text-muted">Today 7:21 pm</small>

                            <div class="border text-sm text-muted p-2 mt-1">
                                Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                                amet adipiscing...
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2"
                            alt="Stacie Hall">
                        <div class="flex-grow-1">
                            <small class="float-end">1h ago</small>
                            <strong>Stacie Hall</strong> posted a new blog<br />

                            <small class="text-muted">Today 6:35 pm</small>
                        </div>
                    </div>

                    <hr />
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary">Load more</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
