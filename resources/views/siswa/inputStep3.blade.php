@extends('welcome')
@section('judul')
    Data Siswa | Step 3
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('id_siswa', $id)->first();
    $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $waktuWali = explode('-', $data->tglLahirWali);
    $waktuAyah = explode('-', $data->tglLahirAyah);
    $waktuIbu = explode('-', $data->tglLahirIbu);
    
    $prodi = DB::table('program_keahlian')->where('status', 'aktif')->get();
    ?>
    <h1 class="h3 mb-3">Detail Wali Dari Ananda <span class="text-danger text-uppercase"><?= $data->namaSiswa ?></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
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
                                <select name="pkrjnWali" id="input6" class="form-control mb-3 text-uppercase">
                                    <option value="">Pilih Pekerjaan</option>
                                    <option <?= $data->pkrjnWali == 'WIRASWASTA' ? 'selected' : '' ?> value="Wiraswasta">
                                        Wiraswasta
                                    </option>
                                    <option <?= $data->pkrjnWali == 'NELAYAN' ? 'selected' : '' ?> value="Nelayan">Nelayan
                                    </option>
                                    <option <?= $data->pkrjnWali == 'PETANI' ? 'selected' : '' ?> value="Petani">Petani
                                    </option>
                                    <option <?= $data->pkrjnWali == 'PETERNAK' ? 'selected' : '' ?> value="Peternak">
                                        Peternak
                                    </option>
                                    <option <?= $data->pkrjnWali == 'PNS/TNI/POLRI' ? 'selected' : '' ?>
                                        value="PNS/TNI/Polri">PNS/TNI/Polri
                                    </option>
                                    <option <?= $data->pkrjnWali == 'KARYAWAN SWASTA' ? 'selected' : '' ?>
                                        value="Karyawan Swasta">Karyawan Swasta
                                    </option>
                                    <option <?= $data->pkrjnWali == 'PEDAGANG BESAR' ? 'selected' : '' ?>
                                        value="Pedagang Besar">Pedagang Besar
                                    </option>
                                    <option <?= $data->pkrjnWali == 'PEDAGANG KECIL' ? 'selected' : '' ?>
                                        value="Pedagang Kecil">Pedagang Kecil
                                    </option>
                                    <option <?= $data->pkrjnWali == 'TIDAK BEKERJA' ? 'selected' : '' ?>
                                        value="Tidak Bekerja">Tidak Bekerja
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Wali</label>
                                <select name="pndknWali" id="input7" class="form-control mb-3 text-uppercase">
                                    <option value="">Pilih Pendidikan</option>
                                    <option <?= $data->pendWali == 'D1' ? 'selected' : '' ?> value="D1">
                                        D1
                                    </option>
                                    <option <?= $data->pendWali == 'D2' ? 'selected' : '' ?> value="D2">
                                        D2
                                    </option>
                                    <option <?= $data->pendWali == 'D3' ? 'selected' : '' ?> value="D3">
                                        D3
                                    </option>
                                    <option <?= $data->pendWali == 'D4' ? 'selected' : '' ?> value="D4">
                                        D4
                                    </option>
                                    <option <?= $data->pendWali == 'INFORMAL' ? 'selected' : '' ?> value="Informal">
                                        Informal
                                    </option>
                                    <option <?= $data->pendWali == 'NON FORMAL' ? 'selected' : '' ?> value="Non Formal">
                                        Non Formal
                                    </option>
                                    <option <?= $data->pendWali == 'PAKET A' ? 'selected' : '' ?> value="Paket A">
                                        Paket A
                                    </option>
                                    <option <?= $data->pendWali == 'PAKET B' ? 'selected' : '' ?> value="Paket B">
                                        Paket B
                                    </option>
                                    <option <?= $data->pendWali == 'PAKET C' ? 'selected' : '' ?> value="Paket C">
                                        Paket C
                                    </option>
                                    <option <?= $data->pendWali == 'PAUD' ? 'selected' : '' ?> value="Paud">
                                        Paud
                                    </option>
                                    <option <?= $data->pendWali == 'PROFESI' ? 'selected' : '' ?> value="Profesi">
                                        Profesi
                                    </option>
                                    <option <?= $data->pendWali == 'PUTUS SD' ? 'selected' : '' ?> value="Putus SD">
                                        Putus SD
                                    </option>
                                    <option <?= $data->pendWali == 'S1' ? 'selected' : '' ?> value="S1">
                                        S1
                                    </option>
                                    <option <?= $data->pendWali == 'S2' ? 'selected' : '' ?> value="S2">
                                        S2
                                    </option>
                                    <option <?= $data->pendWali == 'S2 TERAPAN' ? 'selected' : '' ?> value="S2 Terapan">
                                        S2 Terapan
                                    </option>
                                    <option <?= $data->pendWali == 'S3' ? 'selected' : '' ?> value="S3">
                                        S3
                                    </option>
                                    <option <?= $data->pendWali == 'S3 TERAPAN' ? 'selected' : '' ?> value="S3 Terapan">
                                        S3 Terapan
                                    </option>
                                    <option <?= $data->pendWali == 'SD/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SD/sederajat">
                                        SD/sederajat
                                    </option>
                                    <option <?= $data->pendWali == 'SMP/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMP/sederajat">
                                        SMP/sederajat
                                    </option>
                                    <option <?= $data->pendWali == 'SMA/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMA/sederajat">
                                        SMA/sederajat
                                    </option>
                                    <option <?= $data->pendWali == 'SP-1' ? 'selected' : '' ?> value="Sp-1">
                                        Sp-1
                                    </option>
                                    <option <?= $data->pendWali == 'SP-2' ? 'selected' : '' ?> value="Sp-2">
                                        Sp-2
                                    </option>
                                    <option <?= $data->pendWali == 'TK/SEDERAJAT' ? 'selected' : '' ?>
                                        value="TK/sederajat">
                                        TK/sederajat
                                    </option>
                                    <option <?= $data->pendWali == 'TIDAK SEKOLAH' ? 'selected' : '' ?>
                                        value="Tidak Sekolah">
                                        Tidak Sekolah
                                    </option>
                                    <option <?= $data->pendWali == 'LAINNYA' ? 'selected' : '' ?> value="Lainnya">
                                        Lainnya
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Wali</label>
                                <select class="form-control mb-3 text-uppercase" id="input8" required
                                    name="pndptnWali">
                                    <option value="">Pilih Penghasilan</option>
                                    <option <?= $data->penghWali == 'KURANG DARI RP. 500.000' ? 'selected' : '' ?>
                                        value="Kurang dari Rp. 500.000">
                                        Kurang dari Rp. 500.000
                                    </option>
                                    <option <?= $data->penghWali == 'RP. 500.000 - RP. 999.999' ? 'selected' : '' ?>
                                        value="Rp. 500.000 - Rp. 999.999">
                                        Rp. 500.000 - Rp. 999.999
                                    </option>
                                    <option <?= $data->penghWali == 'RP. 1.000.000 - RP. 1.999.999' ? 'selected' : '' ?>
                                        value="Rp. 1.000.000 - Rp. 1.999.999">
                                        Rp. 1.000.000 - Rp. 1.999.999
                                    </option>
                                    <option <?= $data->penghWali == 'RP. 2.000.000 - RP. 4.999.999' ? 'selected' : '' ?>
                                        value="Rp. 2.000.000 - Rp. 4.999.999">
                                        Rp. 2.000.000 - Rp. 4.999.999
                                    </option>
                                    <option <?= $data->penghWali == 'RP. 5.000.000 - RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Rp. 5.000.000 - Rp. 20.000.000">
                                        Rp. 5.000.000 - Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghWali == 'LEBIH DARI RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Lebih dari Rp. 20.000.000">
                                        Lebih dari Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghWali == 'TIDAK BERPENGHASILAN' ? 'selected' : '' ?>
                                        value="Tidak Berpenghasilan">
                                        Tidak Berpenghasilan
                                    </option>
                                </select>
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
                                <label class="form-label" for="input17">Program Keahlian</label>
                                <select class="form-control mb-3" id="input17" name="program_keahlian" required>
                                    <option value="">Pilih Prodi</option>
                                    <?php
                                    foreach ($prodi as $prd) {
                                    ?>
                                    <option <?= $prd->id_program_keahlian == $data->id_program_keahlian ? 'selected' : '' ?>
                                        value="<?= $prd->id_program_keahlian ?>"><?= $prd->program_keahlian ?></option>
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
                                    <button type="submit" class="btn btn-primary">Lanjut</button>
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
                window.location.href = "{{ url('/step2') }}/<?= $id ?>/<?= $bt ?>"
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
                $('#input6').val("<?= $data->pkrjnWali ?>")
                $('#input6').attr('readonly', '=')
                $('#input7').val("<?= $data->pendWali ?>")
                $('#input7').attr('readonly', '=')
                $('#input8').val("<?= $data->penghWali ?>")
                $('#input8').attr('readonly', '=')
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
                                window.location.href = "{{ url('/step4') }}/" + hasil +
                                    "/<?= $bt ?>"
                            }
                        }
                    })
                }
            })

        })
    </script>
@endsection
