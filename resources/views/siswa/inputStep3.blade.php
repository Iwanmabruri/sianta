@extends('welcome')
@section('judul')
    Data Siswa | Step 3
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('nikSiswa', $nik)->first();
    $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $waktuWali = explode('-', $data->tglLahirWali);
    ?>
    <h1 class="h3 mb-3">Detail Wali Dari Ananda <span class="text-danger text-uppercase"><?= $data->namaSiswa ?></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                {{ csrf_field() }}
                <input type="hidden" name="nikAwal" value="<?= $nik ?>">
                <div class="card">
                    <div class="card-header p-2">
                        <div class="row">
                            <div class="col-md-12">
                                <button id="ayah" class="btn btn-info">Salin Data Ayah</button>
                                <button id="ibu" class="btn btn-info">Salin Data Ibu</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Wali</label>
                                <input type="number" class="form-control" id="input1" name="nik_w"
                                    placeholder="Isi dengan angka" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" required autocomplete="off"
                                    value="<?= $data->nikWali ?>">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input2">Nama Wali</label>
                                <input type="text" class="form-control text-uppercase" id="input2" name="nm_w"
                                    placeholder="Nama Wali" required autocomplete="off" value="<?= $data->nmWali ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input3">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input3" name="tglLahirWali" required>
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <?php
                                    if ($data->tglLahirWali == '') {
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i < 10) {
                                                $tgla = "0" . $i;
                                            } else {
                                                $tgla = $i;
                                            }
                                    ?>
                                    <option value="<?= $tgla ?>"><?= $tgla ?></option>
                                    <?php
                                        }
                                    }else{
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i < 10) {
                                                $tgla = "0" . $i;
                                            } else {
                                                $tgla = $i;
                                            }

                                            if ($waktuWali[2] == $tgla) {
                                    ?>
                                    <option selected value="<?= $tgla ?>"><?= $tgla ?></option>
                                    <?php
                                            }else {
                                    ?>
                                    <option value="<?= $tgla ?>"><?= $tgla ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input4" name="blnLahirWali" required>
                                    <option value="" hidden>Pilih Bulan</option>
                                    <?php
                                    if ($data->tglLahirWali == '') {
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i < 10) {
                                                $blna = "0" . $i;
                                            } else {
                                                $blna = $i;
                                            }
                                            
                                    ?>
                                    <option value="<?= $blna ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                    }
                                    } else {
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i < 10) {
                                                $blna = "0" . $i;
                                            } else {
                                                $blna = $i;
                                            }

                                            if ($waktuWali[1] == $blna) {
                                    ?>
                                    <option selected value="<?= $blna ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                            }else {
                                    ?>
                                    <option value="<?= $blna ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input5">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input5" name="thnLahirWali" required>
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    if ($data->tglLahirWali == '') {
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thna = $i;
                                    ?>
                                    <option value="<?= $thna ?>"><?= $thna ?></option>
                                    <?php
                                        }
                                    }else{
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thna = $i;
                                            
                                            if ($waktuWali[0] == $thna) {
                                    ?>
                                    <option selected value="<?= $thna ?>"><?= $thna ?></option>
                                    <?php
                                            }else{
                                    ?>
                                    <option value="<?= $thna ?>"><?= $thna ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input6">Pekerjaan Wali</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input6" required
                                    name="pkrjnWali" placeholder="Pekerjaan Wali" autocomplete="off"
                                    value="<?= $data->pkrjnWali ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Wali</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input7" required
                                    name="pndknWali" placeholder="Pendidikan Wali" autocomplete="off"
                                    value="<?= $data->pendWali ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Wali</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input8" required
                                    name="pndptnWali" placeholder="Penghasilan Wali" autocomplete="off"
                                    value="<?= $data->penghWali ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input9">Jenis Tempat Tinggal</label>
                                <input type="text" name="tmpTinggal" id="input9"
                                    class="form-control mb-3 text-uppercase" required autocomplete="off"
                                    placeholder="Jenis Tempat Tinggal" value="">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input10">Status Anak</label>
                                <select class="form-control mb-3" id="input10" name="statusAnak" required>
                                    <option value="">Pilih Status</option>
                                    <option <?= $data->statusAnak == 'Kandung' ? 'selected' : '' ?> value="Kandung">Anak
                                        Kandung</option>
                                    <option <?= $data->statusAnak == 'Tiri' ? 'selected' : '' ?> value="Tiri">Anak Tiri
                                    </option>
                                    <option <?= $data->statusAnak == 'Angkat' ? 'selected' : '' ?> value="Angkat">Anak
                                        Angkat</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input11">Anak Ke</label>
                                <input type="number" class="form-control" id="input11" name="anakKe"
                                    placeholder="Isi dengan angka" required autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input12">Jumlah Saudara</label>
                                <input type="number" class="form-control" id="input12" name="jmlSaudara"
                                    placeholder="Isi dengan angka" required autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input13">Nomor HP</label>
                                <input type="number" class="form-control" id="input13" name="noHp"
                                    placeholder="Isi dengan angka" required autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input6">Sekolah Asal</label>
                                <input type="text" class="form-control" id="input14" name="sekolahAsal"
                                    placeholder="Sekolah Asal" required autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Nomor Ijazah</label>
                                <input type="text" class="form-control" id="input15" name="noIjazah"
                                    placeholder="Nomor Ijazah" required autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Prodi</label>
                                <select class="form-control mb-3" id="input16" name="prodi" required>
                                    <option value="">Pilih Prodi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="batalkan" class="btn btn-danger">Batal</button>
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
        $(function() {
            $('#formSebelumnya').click(function() {
                $("#loading").css("display", "block")
                window.location.href = "{{ url('/step2') }}/<?= $nik ?>/<?= $bt ?>"
            })

            $('#batalkan').click(function() {
                var nik = $('#nik').val()
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
                    $("#loading").css("display", "block")
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('batal') }}',
                            data: {
                                "_token": '{{ csrf_token() }}',
                                "nik": nik
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

            $("#formSiswa").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('simpanStep3') }}',
                        data: data,
                        success: function(hasil) {
                            // $('#loading').css("display", "none")
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
        })
    </script>
@endsection
