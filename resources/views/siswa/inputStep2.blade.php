@extends('welcome')
@section('judul')
    Data Siswa | Step 2
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('id_siswa', $id)->first();
    $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $waktuAyah = explode('-', $data->tglLahirAyah);
    $waktuIbu = explode('-', $data->tglLahirIbu);
    ?>
    <h1 class="h3 mb-3">Detail Orang Tua Ananda <span class="text-danger"><?= $data->namaSiswa ?></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Ayah</label>
                                <input type="number" class="form-control" id="input1" name="nik_a"
                                    placeholder="Isi dengan angka" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" required autocomplete="off"
                                    value="<?= $data->nikAyah ?>">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input2">Nama Ayah</label>
                                <input type="text" class="form-control text-uppercase" id="input2" name="nm_a"
                                    placeholder="Nama Ayah" required autocomplete="off" value="<?= $data->nmAyah ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input3">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input3" name="tglLahirAyah" required>
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <?php
                                    if ($data->tglLahirAyah == '') {
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

                                            if ($waktuAyah[2] == $tgla) {
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
                                <select class="form-control mb-3" id="input4" name="blnLahirAyah" required>
                                    <option value="" hidden>Pilih Bulan</option>
                                    <?php
                                    if ($data->tglLahirAyah == '') {
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

                                            if ($waktuAyah[1] == $blna) {
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
                                <select class="form-control mb-3" id="input5" name="thnLahirAyah" required>
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    if ($data->tglLahirAyah == '') {
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thna = $i;
                                    ?>
                                    <option value="<?= $thna ?>"><?= $thna ?></option>
                                    <?php
                                        }
                                    }else{
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thna = $i;
                                            
                                            if ($waktuAyah[0] == $thna) {
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
                                <label class="form-label" for="input6">Pekerjaan Ayah</label>
                                <select name="pkrjnAyah" id="input6" class="form-control mb-3 text-uppercase" required>
                                    <option value="">Pilih Pekerjaan</option>
                                    <option <?= $data->pkrjnAyah == 'WIRASWASTA' ? 'selected' : '' ?> value="Wiraswasta">
                                        Wiraswasta
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'NELAYAN' ? 'selected' : '' ?> value="Nelayan">Nelayan
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'PETANI' ? 'selected' : '' ?> value="Petani">Petani
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'PETERNAK' ? 'selected' : '' ?> value="Peternak">
                                        Peternak
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'PNS/TNI/POLRI' ? 'selected' : '' ?>
                                        value="PNS/TNI/Polri">PNS/TNI/Polri
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'KARYAWAN SWASTA' ? 'selected' : '' ?>
                                        value="Karyawan Swasta">Karyawan Swasta
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'PEDAGANG BESAR' ? 'selected' : '' ?>
                                        value="Pedagang Besar">Pedagang Besar
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'PEDAGANG KECIL' ? 'selected' : '' ?>
                                        value="Pedagang Kecil">Pedagang Kecil
                                    </option>
                                    <option <?= $data->pkrjnAyah == 'TIDAK BEKERJA' ? 'selected' : '' ?>
                                        value="Tidak Bekerja">Tidak Bekerja
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input6" required
                                    name="pkrjnAyah" placeholder="Pekerjaan Ayah" autocomplete="off"
                                    value="<?= $data->pkrjnAyah ?>"> --}}
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Ayah</label>
                                <select name="pndknAyah" id="input7" class="form-control mb-3 text-uppercase" required>
                                    <option value="">Pilih Pendidikan</option>
                                    <option <?= $data->pendAyah == 'D1' ? 'selected' : '' ?> value="D1">
                                        D1
                                    </option>
                                    <option <?= $data->pendAyah == 'D2' ? 'selected' : '' ?> value="D2">
                                        D2
                                    </option>
                                    <option <?= $data->pendAyah == 'D3' ? 'selected' : '' ?> value="D3">
                                        D3
                                    </option>
                                    <option <?= $data->pendAyah == 'D4' ? 'selected' : '' ?> value="D4">
                                        D4
                                    </option>
                                    <option <?= $data->pendAyah == 'INFORMAL' ? 'selected' : '' ?> value="Informal">
                                        Informal
                                    </option>
                                    <option <?= $data->pendAyah == 'NON FORMAL' ? 'selected' : '' ?> value="Non Formal">
                                        Non Formal
                                    </option>
                                    <option <?= $data->pendAyah == 'PAKET A' ? 'selected' : '' ?> value="Paket A">
                                        Paket A
                                    </option>
                                    <option <?= $data->pendAyah == 'PAKET B' ? 'selected' : '' ?> value="Paket B">
                                        Paket B
                                    </option>
                                    <option <?= $data->pendAyah == 'PAKET C' ? 'selected' : '' ?> value="Paket C">
                                        Paket C
                                    </option>
                                    <option <?= $data->pendAyah == 'PAUD' ? 'selected' : '' ?> value="Paud">
                                        Paud
                                    </option>
                                    <option <?= $data->pendAyah == 'PROFESI' ? 'selected' : '' ?> value="Profesi">
                                        Profesi
                                    </option>
                                    <option <?= $data->pendAyah == 'PUTUS SD' ? 'selected' : '' ?> value="Putus SD">
                                        Putus SD
                                    </option>
                                    <option <?= $data->pendAyah == 'S1' ? 'selected' : '' ?> value="S1">
                                        S1
                                    </option>
                                    <option <?= $data->pendAyah == 'S2' ? 'selected' : '' ?> value="S2">
                                        S2
                                    </option>
                                    <option <?= $data->pendAyah == 'S2 TERAPAN' ? 'selected' : '' ?> value="S2 Terapan">
                                        S2 Terapan
                                    </option>
                                    <option <?= $data->pendAyah == 'S3' ? 'selected' : '' ?> value="S3">
                                        S3
                                    </option>
                                    <option <?= $data->pendAyah == 'S3 TERAPAN' ? 'selected' : '' ?> value="S3 Terapan">
                                        S3 Terapan
                                    </option>
                                    <option <?= $data->pendAyah == 'SD/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SD/sederajat">
                                        SD/sederajat
                                    </option>
                                    <option <?= $data->pendAyah == 'SMP/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMP/sederajat">
                                        SMP/sederajat
                                    </option>
                                    <option <?= $data->pendAyah == 'SMA/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMA/sederajat">
                                        SMA/sederajat
                                    </option>
                                    <option <?= $data->pendAyah == 'SP-1' ? 'selected' : '' ?> value="Sp-1">
                                        Sp-1
                                    </option>
                                    <option <?= $data->pendAyah == 'SP-2' ? 'selected' : '' ?> value="Sp-2">
                                        Sp-2
                                    </option>
                                    <option <?= $data->pendAyah == 'TK/SEDERAJAT' ? 'selected' : '' ?>
                                        value="TK/sederajat">
                                        TK/sederajat
                                    </option>
                                    <option <?= $data->pendAyah == 'TIDAK SEKOLAH' ? 'selected' : '' ?>
                                        value="Tidak Sekolah">
                                        Tidak Sekolah
                                    </option>
                                    <option <?= $data->pendAyah == 'LAINNYA' ? 'selected' : '' ?> value="Lainnya">
                                        Lainnya
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input7" required
                                    name="pndknAyah" placeholder="Pendidikan Ayah" autocomplete="off"
                                    value="<?= $data->pendAyah ?>"> --}}
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Ayah</label>
                                <select name="pndptnAyah" id="input8" class="form-control mb-3 text-uppercase"
                                    required>
                                    <option value="">Pilih Penghasilan</option>
                                    <option <?= $data->penghAyah == 'KURANG dari RP. 500.000' ? 'selected' : '' ?>
                                        value="Kurang dari Rp. 500.000">
                                        Kurang dari Rp. 500.000
                                    </option>
                                    <option <?= $data->penghAyah == 'RP. 500.000 - RP. 999.999' ? 'selected' : '' ?>
                                        value="Rp. 500.000 - Rp. 999.999">
                                        Rp. 500.000 - Rp. 999.999
                                    </option>
                                    <option <?= $data->penghAyah == 'RP. 1.000.000 - RP. 1.999.999' ? 'selected' : '' ?>
                                        value="Rp. 1.000.000 - Rp. 1.999.999">
                                        Rp. 1.000.000 - Rp. 1.999.999
                                    </option>
                                    <option <?= $data->penghAyah == 'RP. 2.000.000 - RP. 4.999.999' ? 'selected' : '' ?>
                                        value="Rp. 2.000.000 - Rp. 4.999.999">
                                        Rp. 2.000.000 - Rp. 4.999.999
                                    </option>
                                    <option <?= $data->penghAyah == 'RP. 5.000.000 - RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Rp. 5.000.000 - Rp. 20.000.000">
                                        Rp. 5.000.000 - Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghAyah == 'LEBIH DARI RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Lebih dari Rp. 20.000.000">
                                        Lebih dari Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghAyah == 'TIDAK BERPENGHASILAN' ? 'selected' : '' ?>
                                        value="Tidak Berpenghasilan">
                                        Tidak Berpenghasilan
                                    </option>

                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input8" required
                                    name="pndptnAyah" placeholder="Penghasilan Ayah" autocomplete="off"
                                    value="<?= $data->penghAyah ?>"> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input9">NIK Ibu</label>
                                <input type="number" class="form-control" id="input9" name="nik_i"
                                    placeholder="Isi dengan angka" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" required autocomplete="off"
                                    value="<?= $data->nikIbu ?>">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input10">Nama Ibu</label>
                                <input type="text" class="form-control text-uppercase" id="input10" name="nm_i"
                                    placeholder="Nama Ibu" required autocomplete="off" value="<?= $data->nmIbu ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input11">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input11" name="tglLahirIbu" required>
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <?php
                                    if ($data->tglLahirIbu == '') {
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i < 10) {
                                                $tgli = "0" . $i;
                                            } else {
                                                $tgli = $i;
                                            }
                                        
                                    ?>
                                    <option value="<?= $tgli ?>"><?= $tgli ?></option>
                                    <?php
                                        }
                                    }else{
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i < 10) {
                                                $tgli = "0" . $i;
                                            } else {
                                                $tgli = $i;
                                            }
                                            if ($waktuIbu[2] == $tgli) {
                                    ?>
                                    <option selected value="<?= $tgli ?>"><?= $tgli ?></option>
                                    <?php
                                            } else {
                                    ?>
                                    <option value="<?= $tgli ?>"><?= $tgli ?></option>
                                    <?php
                                            }
                                            
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input12">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input12" name="blnLahirIbu" required>
                                    <option value="" hidden>Pilih Bulan</option>
                                    <?php
                                    if ($data->tglLahirIbu == '') {
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i < 10) {
                                                $blni = "0" . $i;
                                            } else {
                                                $blni = $i;
                                            }
                                            ?>
                                    <option value="<?= $blni ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                        }
                                    }else {
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i < 10) {
                                                $blni = "0" . $i;
                                            } else {
                                                $blni = $i;
                                            }
                                            if ($waktuIbu[1] == $blni) {
                                    ?>
                                    <option selected value="<?= $blni ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                            }else {
                                    ?>
                                    <option value="<?= $blni ?>"><?= $namaBulan[$i] ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input13">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input13" name="thnLahirIbu" required>
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    if ($data->tglLahirIbu == '') {
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thni = $i;
                                    ?>
                                    <option value="<?= $thni ?>"><?= $thni ?></option>
                                    <?php
                                        }
                                    }else {
                                        for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thni = $i;
                                            if ($waktuIbu[0] == $thni) {
                                    ?>
                                    <option selected value="<?= $thni ?>"><?= $thni ?></option>
                                    <?php
                                            }else{
                                    ?>
                                    <option value="<?= $thni ?>"><?= $thni ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input14">Pekerjaan Ibu</label>
                                <select name="pkrjnIbu" id="input14" class="form-control mb-3 text-uppercase">
                                    <option value="">Pilih Pekerjaan</option>
                                    <option <?= $data->pkrjnIbu == 'WIRASWASTA' ? 'selected' : '' ?> value="Wiraswasta">
                                        Wiraswasta
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'NELAYAN' ? 'selected' : '' ?> value="Nelayan">Nelayan
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'PETANI' ? 'selected' : '' ?> value="Petani">Petani
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'PETERNAK' ? 'selected' : '' ?> value="Peternak">
                                        Peternak
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'PNS/TNI/POLRI' ? 'selected' : '' ?>
                                        value="PNS/TNI/Polri">PNS/TNI/Polri
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'KARYAWAN SWASTA' ? 'selected' : '' ?>
                                        value="Karyawan Swasta">Karyawan Swasta
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'PEDAGANG BESAR' ? 'selected' : '' ?>
                                        value="Pedagang Besar">Pedagang Besar
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'PEDAGANG KECIL' ? 'selected' : '' ?>
                                        value="Pedagang Kecil">Pedagang Kecil
                                    </option>
                                    <option <?= $data->pkrjnIbu == 'TIDAK BEKERJA' ? 'selected' : '' ?>
                                        value="Tidak Bekerja">Tidak Bekerja
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input14" required
                                    name="pkrjnIbu" placeholder="Pekerjaan Ibu" autocomplete="off"
                                    value="<?= $data->pkrjnIbu ?>"> --}}
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Pendidikan Ibu</label>
                                <select name="pndknIbu" id="input15" class="form-control mb-3 text-uppercase">
                                    <option value="">Pilih Pendidikan</option>
                                    <option <?= $data->pendIbu == 'D1' ? 'selected' : '' ?> value="D1">
                                        D1
                                    </option>
                                    <option <?= $data->pendIbu == 'D2' ? 'selected' : '' ?> value="D2">
                                        D2
                                    </option>
                                    <option <?= $data->pendIbu == 'D3' ? 'selected' : '' ?> value="D3">
                                        D3
                                    </option>
                                    <option <?= $data->pendIbu == 'D4' ? 'selected' : '' ?> value="D4">
                                        D4
                                    </option>
                                    <option <?= $data->pendIbu == 'INFORMAL' ? 'selected' : '' ?> value="Informal">
                                        Informal
                                    </option>
                                    <option <?= $data->pendIbu == 'NON FORMAL' ? 'selected' : '' ?> value="Non Formal">
                                        Non Formal
                                    </option>
                                    <option <?= $data->pendIbu == 'PAKET A' ? 'selected' : '' ?> value="Paket A">
                                        Paket A
                                    </option>
                                    <option <?= $data->pendIbu == 'PAKET B' ? 'selected' : '' ?> value="Paket B">
                                        Paket B
                                    </option>
                                    <option <?= $data->pendIbu == 'PAKET C' ? 'selected' : '' ?> value="Paket C">
                                        Paket C
                                    </option>
                                    <option <?= $data->pendIbu == 'PAUD' ? 'selected' : '' ?> value="Paud">
                                        Paud
                                    </option>
                                    <option <?= $data->pendIbu == 'PROFESI' ? 'selected' : '' ?> value="Profesi">
                                        Profesi
                                    </option>
                                    <option <?= $data->pendIbu == 'PUTUS SD' ? 'selected' : '' ?> value="Putus SD">
                                        Putus SD
                                    </option>
                                    <option <?= $data->pendIbu == 'S1' ? 'selected' : '' ?> value="S1">
                                        S1
                                    </option>
                                    <option <?= $data->pendIbu == 'S2' ? 'selected' : '' ?> value="S2">
                                        S2
                                    </option>
                                    <option <?= $data->pendIbu == 'S2 TERAPAN' ? 'selected' : '' ?> value="S2 Terapan">
                                        S2 Terapan
                                    </option>
                                    <option <?= $data->pendIbu == 'S3' ? 'selected' : '' ?> value="S3">
                                        S3
                                    </option>
                                    <option <?= $data->pendIbu == 'S3 TERAPAN' ? 'selected' : '' ?> value="S3 Terapan">
                                        S3 Terapan
                                    </option>
                                    <option <?= $data->pendIbu == 'SD/SEDERAJAT' ? 'selected' : '' ?> value="SD/sederajat">
                                        SD/sederajat
                                    </option>
                                    <option <?= $data->pendIbu == 'SMP/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMP/sederajat">
                                        SMP/sederajat
                                    </option>
                                    <option <?= $data->pendIbu == 'SMA/SEDERAJAT' ? 'selected' : '' ?>
                                        value="SMA/sederajat">
                                        SMA/sederajat
                                    </option>
                                    <option <?= $data->pendIbu == 'SP-1' ? 'selected' : '' ?> value="Sp-1">
                                        Sp-1
                                    </option>
                                    <option <?= $data->pendIbu == 'SP-2' ? 'selected' : '' ?> value="Sp-2">
                                        Sp-2
                                    </option>
                                    <option <?= $data->pendIbu == 'TK/SEDERAJAT' ? 'selected' : '' ?> value="TK/sederajat">
                                        TK/sederajat
                                    </option>
                                    <option <?= $data->pendIbu == 'TIDAK SEKOLAH' ? 'selected' : '' ?>
                                        value="Tidak Sekolah">
                                        Tidak Sekolah
                                    </option>
                                    <option <?= $data->pendIbu == 'LAINNYA' ? 'selected' : '' ?> value="Lainnya">
                                        Lainnya
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input15" required
                                    name="pndknIbu" placeholder="Pendidikan Ibu" autocomplete="off"
                                    value="<?= $data->pendIbu ?>"> --}}
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input16">Penghasilan Ibu</label>
                                <select class="form-control mb-3 text-uppercase" id="input16" required
                                    name="pndptnIbu">
                                    <option value="">Pilih Penghasilan</option>
                                    <option <?= $data->penghIbu == 'KURANG DARI RP. 500.000' ? 'selected' : '' ?>
                                        value="Kurang dari Rp. 500.000">
                                        Kurang dari Rp. 500.000
                                    </option>
                                    <option <?= $data->penghIbu == 'RP. 500.000 - RP. 999.999' ? 'selected' : '' ?>
                                        value="Rp. 500.000 - Rp. 999.999">
                                        Rp. 500.000 - Rp. 999.999
                                    </option>
                                    <option <?= $data->penghIbu == 'RP. 1.000.000 - RP. 1.999.999' ? 'selected' : '' ?>
                                        value="Rp. 1.000.000 - Rp. 1.999.999">
                                        Rp. 1.000.000 - Rp. 1.999.999
                                    </option>
                                    <option <?= $data->penghIbu == 'RP. 2.000.000 - RP. 4.999.999' ? 'selected' : '' ?>
                                        value="Rp. 2.000.000 - Rp. 4.999.999">
                                        Rp. 2.000.000 - Rp. 4.999.999
                                    </option>
                                    <option <?= $data->penghIbu == 'RP. 5.000.000 - RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Rp. 5.000.000 - Rp. 20.000.000">
                                        Rp. 5.000.000 - Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghIbu == 'LEBIH DARI RP. 20.000.000' ? 'selected' : '' ?>
                                        value="Lebih dari Rp. 20.000.000">
                                        Lebih dari Rp. 20.000.000
                                    </option>
                                    <option <?= $data->penghIbu == 'TIDAK BERPENGHASILAN' ? 'selected' : '' ?>
                                        value="Tidak Berpenghasilan">
                                        Tidak Berpenghasilan
                                    </option>
                                </select>
                                {{-- <input type="text" class="form-control mb-3 text-uppercase" id="input16" required
                                    name="pndptnIbu" placeholder="Penghasilan Ibu" autocomplete="off"
                                    value="<?= $data->penghIbu ?>"> --}}
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
            $('#formSebelumnya').click(function() {
                $("#loading").css("display", "block")
                window.location.href = "{{ url('/step1') }}/<?= $id ?>/<?= $bt ?>"
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

            $("#formSiswa").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('simpanStep2') }}',
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
                                window.location.href = "{{ url('/step3') }}/" + hasil +
                                    "/<?= $bt ?>"
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
