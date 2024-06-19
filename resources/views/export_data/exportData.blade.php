@extends('welcome')

@section('judul')
    Export Data
@endsection

<?php
$prodi = DB::table('program_keahlian')->where('status', 'aktif')->get();
$dataThnAjr = DB::table('tahun_ajaran')->where('status', '=', 'aktif')->get();
$dataProg = DB::table('program_keahlian')->where('status', '=', 'aktif')->get();
?>
@section('konten')
    <h1 class="h3 mb-3">Export Data</h1>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Data Pertahun Angkatan</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="tahun" class="form-label">Tahun Angkatan</label>
                            <select name="tahun" id="tahun" class="form-control mb-3">
                                <option value="">Tahun Angkatan</option>
                                <?php
                                for ($i = 2021; $i < date('Y') + 2; $i++) {
                                ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Program Keahlian</label>
                            <select class="form-control mb-3" id="prodi" name="program_keahlian" required>
                                <option value="">Pilih Prodi</option>
                                <?php
                                foreach ($prodi as $prd) {
                                ?>
                                <option value="<?= $prd->id_program_keahlian ?>"><?= $prd->bidang_keahlian ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button id="pertahun" class="btn btn-primary btn-sm">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Data Perkelas</div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="idthn">
                        <input type="hidden" id="idprog">
                        <div class="col-md-12">
                            <label class="form-label" for="input4">tahun Ajaran</label>
                            <select class="form-control mb-3" id="thn" name="thn" required>
                                <option value="">Tahun Ajaran</option>
                                <?php
                                    foreach ($dataThnAjr as  $val) {
                                        ?>
                                <option value="<?= $val->id_tahun_ajaran ?>"><?= $val->tahun_ajaran ?></option>
                                <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="input4">Program Keahlian</label>
                            <select class="form-control mb-3" id="prog" name="prog" required>
                                <option value="">Program Keahlian</option>
                                <?php
                                    foreach ($dataProg as  $val) {
                                        ?>
                                <option value="<?= $val->id_program_keahlian ?>">
                                    <?= $val->program_keahlian ?>
                                </option>
                                <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="input4">Kelas</label>
                            <select class="data-kelas form-control" name="kelas" id="input13" required>
                                <option value="">Kelas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button id="perkelas" class="btn btn-primary btn-sm">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#pertahun').click(function() {
                var tahun = $('#tahun').val()
                var prodi = $('#prodi').val()
                if (tahun == '') {
                    swal.fire({
                        title: 'Error',
                        text: 'Anda belum memilih tahun angkatan',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    })
                } else if (prodi == '') {
                    swal.fire({
                        title: 'Error',
                        text: 'Anda belum memilih Program Keahlian',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    })
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('export.cekDataPertahun') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "tahun": tahun,
                            "prodi": prodi
                        },
                        success: function(hasil) {
                            if (hasil == 1) {
                                $("#loading").css("display", "none")
                                swal.fire({
                                    title: 'Error',
                                    text: 'Tidak ada siswa',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6',
                                })
                            } else {
                                $("#loading").css("display", "none")
                                window.location.href = "{{ url('pertahun') }}/" +
                                    prodi + "/" + tahun
                            }
                        }
                    });
                }
            })

            $('select#thn').change(function() {
                var i = $(this).val()
                $('#idthn').val(i)
            })

            $('select#prog').change(function() {
                var b = $(this).val()
                var t = $("#idthn").val()
                $.ajax({
                    type: 'POST',
                    url: '{{ route('classroomStudent.ambilKelas') }}',
                    data: {
                        "_token": '{{ csrf_token() }}',
                        "thn": t,
                        "prog": b
                    },
                    success: function(data) {
                        $('#loading').css("display", "none")
                        $("#input13").html("")
                        $("#input13").append(data)
                    }
                })
            })

            $('#perkelas').click(function() {
                var tahun = $('#thn').val()
                var prodi = $('#prog').val()
                var kelas = $('#input13').val()
                if (tahun == '') {
                    swal.fire({
                        title: 'Error',
                        text: 'Anda belum memilih tahun ajaran',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    })
                } else if (prodi == '') {
                    swal.fire({
                        title: 'Error',
                        text: 'Anda belum memilih Program Keahlian',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    })
                } else if (kelas == '') {
                    swal.fire({
                        title: 'Error',
                        text: 'Anda belum memilih Kelas',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    })
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('export.cekDataPerkelas') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "kelas": kelas
                        },
                        success: function(hasil) {
                            if (hasil == 1) {
                                $("#loading").css("display", "none")
                                swal.fire({
                                    title: 'Error',
                                    text: 'Tidak ada siswa',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6',
                                })
                            } else {
                                $("#loading").css("display", "none")
                                window.location.href = "{{ url('perkelas') }}/" +
                                    prodi + "/" + tahun + "/" + kelas
                            }
                        }
                    });
                }
            })

        })
    </script>
@endsection
