@extends('welcome')
@section('judul')
    Data Siswa | Step 3
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('nikSiswa', $nik)->first();
    $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $waktuWali = explode('-', $data->tglLahirWali);
    $waktuAyah = explode('-', $data->tglLahirAyah);
    $waktuIbu = explode('-', $data->tglLahirIbu);
    
    $prodi = DB::table('prodi')->where('status', 'aktif')->get();
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
                                <button type="button" id="ayah" class="btn btn-info">Salin Data Ayah</button>
                                <button type="button" id="ibu" class="btn btn-info">Salin Data Ibu</button>
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
                                    placeholder="Jenis Tempat Tinggal" value="<?= $data->jnsTempTinggal ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input10">Status Anak</label>
                                <select class="form-control mb-3" id="input10" name="statusAnak" required>
                                    <option value="">Pilih Status</option>
                                    <option <?= $data->statusAnak == 'ANAK KANDUNG' ? 'selected' : '' ?>
                                        value="ANAK KANDUNG">ANAK KANDUNG</option>
                                    <option <?= $data->statusAnak == 'ANAK TIRI' ? 'selected' : '' ?> value="ANAK TIRI">
                                        ANAK TIRI
                                    </option>
                                    <option <?= $data->statusAnak == 'ANAK ANGKAT' ? 'selected' : '' ?>
                                        value="ANAK ANGKAT">ANAK ANGKAT</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input11">Anak Ke</label>
                                <input type="number" class="form-control" id="input11" name="anakKe"
                                    placeholder="Isi dengan angka" required autocomplete="off"
                                    value="<?= $data->anakKe == 99 ? '' : $data->anakKe ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input12">Jumlah Saudara</label>
                                <input type="number" class="form-control" id="input12" name="jmlSaudara"
                                    placeholder="Isi dengan angka" required autocomplete="off"
                                    value="<?= $data->jmlSaudara == 99 ? '' : $data->jmlSaudara ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input13">Nomor HP</label>
                                <input type="number" data-parsley-length="[11,13]"
                                    data-parsley-length-message="harus diisi 11 atau 13 angka" class="form-control"
                                    id="input13" name="noHp" placeholder="Isi dengan angka" required
                                    autocomplete="off" value="<?= strlen($data->nohp) == 1 ? '' : $data->nohp ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input14">Sekolah Asal</label>
                                <input type="text" class="form-control text-uppercase" id="input14"
                                    name="sekolahAsal" placeholder="Sekolah Asal" required autocomplete="off"
                                    value="<?= $data->sklAsal ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Nomor Ijazah</label>
                                <input type="text" class="form-control" id="input15" name="noIjazah"
                                    placeholder="Nomor Ijazah" required autocomplete="off"
                                    value="<?= $data->noIjazah ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input16">Agama</label>
                                <input type="text" class="form-control text-uppercase" id="input16" name="agama"
                                    placeholder="agama" required autocomplete="off" value="<?= $data->agama ?>">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="input17">Prodi</label>
                                <select class="form-control mb-3" id="input17" name="prodi" required>
                                    <option value="">Pilih Prodi</option>
                                    <?php
                                    foreach ($prodi as $prd) {
                                    ?>
                                    <option <?= $prd->idProdi == $data->idProdi ? 'selected' : '' ?>
                                        value="<?= $prd->idProdi ?>"><?= $prd->nmProdi ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="tglDiterima" name="tglDiterima"
                                    value="<?= $data->tglDiterima ?>">
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
        $(function() {
            $('#tglDiterima').val('<?= date('Y-m-d') ?>')

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

            $('#ayah').click(function() {
                $('#input1').val("<?= $data->nikAyah ?>")
                $('#input1').attr('readonly', '=')
                $('#input2').val("<?= $data->nmAyah ?>")
                $('#input2').attr('readonly', '=')
                $('#input3').val("<?= $waktuAyah[2] ?>")
                $('#input3').attr('readonly', '=')
                $('#input4').val("<?= $waktuAyah[1] ?>")
                $('#input4').attr('readonly', '=')
                $('#input5').val("<?= $waktuAyah[0] ?>")
                $('#input5').attr('readonly', '=')
                $('#input6').val("<?= $data->pkrjnAyah ?>")
                $('#input6').attr('readonly', '=')
                $('#input7').val("<?= $data->pendAyah ?>")
                $('#input7').attr('readonly', '=')
                $('#input8').val("<?= $data->penghAyah ?>")
                $('#input8').attr('readonly', '=')
            })

            $('#ibu').click(function() {
                $('#input1').val("<?= $data->nikIbu ?>")
                $('#input1').attr('readonly', '=')
                $('#input2').val("<?= $data->nmIbu ?>")
                $('#input2').attr('readonly', '=')
                $('#input3').val("<?= $waktuIbu[2] ?>")
                $('#input3').attr('readonly', '=')
                $('#input4').val("<?= $waktuIbu[1] ?>")
                $('#input4').attr('readonly', '=')
                $('#input5').val("<?= $waktuIbu[0] ?>")
                $('#input5').attr('readonly', '=')
                $('#input6').val("<?= $data->pkrjnIbu ?>")
                $('#input6').attr('readonly', '=')
                $('#input7').val("<?= $data->pendIbu ?>")
                $('#input7').attr('readonly', '=')
                $('#input8').val("<?= $data->penghIbu ?>")
                $('#input8').attr('readonly', '=')
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
                                url: '{{ route('simpanStep3') }}',
                                data: data,
                                success: function(hasil) {
                                    // $('#loading').css("display", "none")
                                    window.location.href =
                                        "{{ url('/student') }}"
                                }
                            })
                        }
                    })
                }
            })
        })
    </script>
@endsection
