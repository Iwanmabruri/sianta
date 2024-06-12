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
                            <h3 class="mb-2"><?= DB::table('siswa')->where('status', 'aktif')->count() ?> Siswa</h3>
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
                            <h3 class="mb-2"><?= DB::table('pegawai')->where('status', 'aktif')->count() ?> Pegawai</h3>
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
                            <h3 class="mb-2"><?= DB::table('kelas')->where('status', 'aktif')->count() ?> Ruang</h3>
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
                    <h5 class="card-title mb-0">Grafik Siswa (Tahun)</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Grafik Siswa (Mutasi Keluar)</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $dataSiswaPertahun = DB::table('siswa')->select(DB::raw('COUNT(id_siswa) as jml'), DB::raw('YEAR(tglDiterima) as thn'))->groupBy(DB::raw('YEAR(tglDiterima)'))->where('status', 'aktif')->get();
    $dataSiswaMutasi = DB::table('mutasi')->select(DB::raw('COUNT(id_siswa) as jml'), DB::raw('YEAR(tglMutasi) as thn'))->groupBy(DB::raw('YEAR(tglMutasi)'))->get();
    
    foreach ($dataSiswaPertahun as $res) {
        $jml[] = $res->jml;
        $thn[] = $res->thn;
    }
    foreach ($dataSiswaMutasi as $res) {
        $jmlM[] = $res->jml;
        $thnM[] = $res->thn;
    }
    
    ?>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($thn) ?>,
                datasets: [{
                    label: 'siswa',
                    data: <?= json_encode($jml) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?= json_encode($thnM) ?>,
                datasets: [{
                    label: 'siswa',
                    data: <?= json_encode($jmlM) ?>,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
