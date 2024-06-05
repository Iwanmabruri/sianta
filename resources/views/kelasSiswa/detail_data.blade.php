@extends('welcome')

<?php 
$data = DB::table('kelas')->where('id_kelas', $id)->first();
$prog = DB::table('program_keahlian')->where('id_program_keahlian', $data->id_program_keahlian)->first();
$wali = DB::table('pegawai')->where('id_pegawai', $data->id_pegawai)->first();

$dataSiswa = DB::table('siswa_perkelas')->where('id_kelas', $id)
->join('siswa', 'siswa_perkelas.id_siswa', '=', 'siswa.id_siswa')
->get();
?>

@section('judul')
    Detail Kelas <?= $data->kelas.' '.$data->ruang.' '.$prog->program_keahlian ?>
@endsection

@section('konten')
<h1 class="h3 mb-3">Detail Kelas <?= $data->kelas.' '.$data->ruang.' '.$prog->program_keahlian.' '.'Wali Kelas'.' '.strtoupper($wali->nmPeg) ?></h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIPD</th>
                                <th>NISN</th>
                                <th>NAMA</th>
                                <th>TANGGAL LAHIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($dataSiswa as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nipdSiswa ?></td>
                                    <td><?= $value->nisnSiswa ?></td>
                                    <td><?= $value->namaSiswa ?></td>
                                    <td><?= $value->tglLahir ?></td>
                                </tr>
                            <?php
                            }    
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    })
</script>
@endsection