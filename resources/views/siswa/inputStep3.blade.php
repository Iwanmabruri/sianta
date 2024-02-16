@extends('welcome')
@section('judul')
    Data Siswa | Step 3
@endsection

@section('konten')
    <h1 class="h3 mb-3">Detail Orang Tua Ananda <span class="text-danger">Fulanah</span></h1>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Ayah</label>
                                <input type="number" class="form-control" id="input1" name="nik_a"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input2">Nama Ayah</label>
                                <input type="text" class="form-control" id="input2" name="nm_a"
                                    placeholder="Nama Ayah">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input3">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input3" name="tglLahirAyah">
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <?php
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
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input4" name="blnLahirAyah">
                                    <option value="" hidden>Pilih Bulan</option>
                                    <?php
                                    for ($i = 1; $i < 13; $i++) {
                                        if ($i < 10) {
                                            $blna = "0" . $i;
                                        } else {
                                            $blna = $i;
                                        }
                                    ?>
                                    <option value="<?= $blna ?>"><?= $blna ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input5">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input5" name="thnLahirAyah">
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thna = $i;
                                    ?>
                                    <option value="<?= $thna ?>"><?= $thna ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input6">Pekerjaan Ayah</label>
                                <select class="form-control mb-3" id="input6" name="pkrjnAyah">
                                    <option value="">Pilih Pekerjaan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Ayah</label>
                                <select class="form-control mb-3" id="input7" name="pndknAyah">
                                    <option value="">Pilih Pendidikan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Ayah</label>
                                <select class="form-control mb-3" id="input8" name="pndptnAyah">
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
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input10">Nama Ibu</label>
                                <input type="text" class="form-control" id="input10" name="nm_i"
                                    placeholder="Nama Ayah">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input11">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input11" name="tglLahirIbu">
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <?php
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
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input12">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input12" name="blnLahirIbu">
                                    <option value="" hidden>Pilih Bulan</option>
                                    <?php
                                    for ($i = 1; $i < 13; $i++) {
                                        if ($i < 10) {
                                            $blni = "0" . $i;
                                        } else {
                                            $blni = $i;
                                        }
                                    ?>
                                    <option value="<?= $blni ?>"><?= $blni ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input13">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input13" name="thnLahirIbu">
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    for ($i = 1900; $i < date('Y')+5; $i++) {
                                            $thni = $i;
                                    ?>
                                    <option value="<?= $thni ?>"><?= $thni ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input14">Pekerjaan Ibu</label>
                                <select class="form-control mb-3" id="input14" name="pkrjnIbu">
                                    <option value="">Pilih Pekerjaan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Pendidikan Ibu</label>
                                <select class="form-control mb-3" id="input15" name="pndknIbu">
                                    <option value="">Pilih Pendidikan</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input16">Penghasilan Ibu</label>
                                <select class="form-control mb-3" id="input16" name="pndptnIbu">
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
                                    <a href="{{ url('/step2') }}" class="btn btn-primary">Kembali</a>
                                    <a href="{{ url('/student') }}" class="btn btn-success">Selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
