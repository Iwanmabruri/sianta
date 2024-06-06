@extends('welcome')
<?php
$data = DB::table('kelas')->where('id_kelas', $id)->first();
$prog = DB::table('program_keahlian')
    ->where('id_program_keahlian', $data->id_program_keahlian)
    ->first();
$wali = DB::table('pegawai')
    ->where('id_pegawai', $data->id_pegawai)
    ->first();

$dataSiswa = DB::table('siswa_perkelas')->where('id_kelas', $id)->join('siswa', 'siswa_perkelas.id_siswa', '=', 'siswa.id_siswa')->get();

$dataThnAjr = DB::table('tahun_ajaran')->where('status', '=', 'aktif')->get();
$dataProg = DB::table('program_keahlian')->where('status', '=', 'aktif')->get();
?>
@section('judul')
    Kelas <?= $data->kelas . ' ' . $data->ruang . ' ' . $prog->program_keahlian ?>
@endsection

@section('konten')
    <h1 class="h3 mb-3">Detail Kelas
        <?= $data->kelas . ' ' . $data->ruang . ' ' . $prog->program_keahlian . ' ' . 'Wali Kelas' . ' ' . strtoupper($wali->nmPeg) ?>
    </h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-2">
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
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-header">
                        Set siswa perkelas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="idKelasLama" value="<?= $id ?>">
                            <input type="hidden" id="idthn">
                            <input type="hidden" id="idprog">
                            <div class="col-md-4">
                                <label class="form-label" for="input4">tahun Ajaran</label>
                                <select class="form-control mb-3" id="thn" name="thn" required>
                                    <option value="" hidden>Pilih Tahun Ajaran</option>
                                    <?php
                                    foreach ($dataThnAjr as  $val) {
                                        ?>
                                    <option value="<?= $val->id_tahun_ajaran ?>"><?= $val->tahun_ajaran ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input4">Program Keahlian</label>
                                <select class="form-control mb-3" id="prog" name="prog" required>
                                    <option value="" hidden>Pilih Program Keahlian</option>
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
                            <div class="col-md-4">
                                <label class="form-label" for="input4">Kelas</label>
                                <select class="data-kelas form-control" name="kelas" id="input13" required>
                                    <option value="">Kelas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="batal" type="button" class="btn btn-sm btn-danger">Kembali</button>
                        <button type="submit" class="btn btn-sm btn-primary float-end">Pindahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            })

            $("#formSiswa").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    // $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('classroomStudent.simpanPindah') }}',
                        data: data,
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            console.log(hasil)
                            if (hasil == 'k') {
                                swal.fire({
                                    title: 'Error',
                                    text: 'Gagal dalam menyimpan data',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6'
                                })
                            } else {

                            }
                        }
                    })
                }
            })

            $('#batal').click(function() {
                window.location.href = "{{ url('/classroomStudent') }}"
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

        })
    </script>
@endsection
