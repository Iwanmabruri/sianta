@extends('welcome')
@section('judul')
    Data Siswa | Print Data
@endsection

@section('konten')
    <?php
    $data_mutasi = DB::table('mutasi')->where('id_mutasi', $id)->first();
    
    $data = DB::table('siswa')
        ->where('id_siswa', $data_mutasi->id_siswa)
        ->first();
    
    ?>
    <h1 class="h3 mb-3">Print Data</h1>
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Print Mutasi <?= $data->namaSiswa ?></h3>
                    <a href="{{ url('/mutation') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/printFormMutasi') }}/<?= $id ?>" target="_blank"
                                class="btn btn-primary w-100">Print
                                Mutasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
