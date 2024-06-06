@extends('welcome')
@section('judul')
    Data Siswa | Step 4
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('id_siswa', $id)->first();
    
    $dataThnAjr = DB::table('tahun_ajaran')->where('status', '=', 'aktif')->get();
    $dataProg = DB::table('program_keahlian')->where('status', '=', 'aktif')->get();
    
    ?>
    <h1 class="h3 mb-3">Penempatan Kelas Ananda <span class="text-danger text-uppercase"><?= $data->namaSiswa ?></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
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
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if ($bt == 'st') {
                                ?>
                                <button type="button" id="batalkan" class="btn btn-danger">Batal</button>
                                <?php
                                } else {
                                ?>
                                <a href="{{ url('/student') }}" class="btn btn-danger">Kembali Ke data
                                    siswa</a>
                                <?php
                                }
                                ?>
                                <a href="" class="btn btn-warning">Refresh</a>
                                <div class="float-end">
                                    <button type="button" id="formSebelumnya" class="btn btn-primary">Kembali</button>
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tglDiterima').val('<?= date('Y-m-d') ?>')

            $('#formSebelumnya').click(function() {
                $("#loading").css("display", "block")
                window.location.href = "{{ url('/step3') }}/<?= $id ?>/<?= $bt ?>"
            })

            $('#batalkan').click(function() {
                var id = $('#id').val()
                swal.fire({
                    title: "Anda Yakin?",
                    text: 'Anda tidak dapat mengmbalikan ini',
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loading").css("display", "block")
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('batal') }}',
                            data: {
                                "_token": '{{ csrf_token() }}',
                                "id": id
                            },
                            success: function(hasil) {
                                $("#loading").css("display", "none")
                                if (hasil == 1) {
                                    swal.fire({
                                        title: 'Dibatalkan',
                                        text: 'Anda Berhasil membatalkan data ini',
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                    }).then(() => {
                                        window.location.href =
                                            "{{ url('/student') }}"
                                    })
                                }
                            }
                        })
                    }
                })
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

            $("#formSiswa").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    swal.fire({
                        title: "Apakah sudah selesai?",
                        text: 'Pastikan semua data telah benar!',
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#loading').css("display", "block")
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('simpanStep4') }}',
                                data: data,
                                success: function(hasil) {
                                    $("#loading").css("display", "none")
                                    if (hasil == 1) {
                                        swal.fire({
                                            title: 'Tersimpan',
                                            text: 'Data berhasil tersimpan',
                                            icon: 'success',
                                            confirmButtonColor: '#3085d6',
                                        }).then(() => {
                                            window.location.href =
                                                "{{ url('/student') }}"
                                        })
                                    }
                                }
                            })
                        }
                    })
                }
            })
        })
    </script>
@endsection
