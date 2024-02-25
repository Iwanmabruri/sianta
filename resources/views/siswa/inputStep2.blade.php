@extends('welcome')
@section('judul')
    Data Siswa | Step 3
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('nikSiswa', $nik)->first();
    $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $waktuAyah = explode('-', $data->tglLahirAyah);
    $waktuIbu = explode('-', $data->tglLahirIbu);
    ?>
    <h1 class="h3 mb-3">Detail Orang Tua Ananda <span class="text-danger"><?= $data->namaSiswa ?></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Ayah</label>
                                <input type="number" class="form-control" id="input1" name="nik_a"
                                    placeholder="Isi dengan angka" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" required autocomplete="off"
                                    value="">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input2">Nama Ayah</label>
                                <input type="text" class="form-control" id="input2" name="nm_a"
                                    placeholder="Nama Ayah" required autocomplete="off" value="">
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
                                <select class="form-control mb-3" id="input6" name="pkrjnAyah" required>
                                    <option value="">Pilih Pekerjaan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Ayah</label>
                                <select class="form-control mb-3" id="input7" name="pndknAyah" required>
                                    <option value="">Pilih Pendidikan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Ayah</label>
                                <select class="form-control mb-3" id="input8" name="pndptnAyah" required>
                                    <option value="">Pilih Penghasilan</option>
                                </select>
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
                                    value="">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input10">Nama Ibu</label>
                                <input type="text" class="form-control" id="input10" name="nm_i"
                                    placeholder="Nama Ibu" required autocomplete="off" value="">
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
                                <select class="form-control mb-3" id="input14" name="pkrjnIbu" required>
                                    <option value="">Pilih Pekerjaan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Pendidikan Ibu</label>
                                <select class="form-control mb-3" id="input15" name="pndknIbu" required>
                                    <option value="">Pilih Pendidikan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input16">Penghasilan Ibu</label>
                                <select class="form-control mb-3" id="input16" name="pndptnIbu" required>
                                    <option value="">Pilih Penghasilan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger">Batal</button>
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
        $(function() {
            $('#formSebelumnya').click(function() {
                window.location.href = "{{ url('/step1') }}/<?= $nik ?>/<?= $bt ?>"
            })
        })
    </script>
@endsection
