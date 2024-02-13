@extends('welcome')
@section('judul')
    Data Siswa | Step 1
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Diri Dari Ananda <span class="text-danger">Fulanah</span></h1>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input1">NIK</label>
                                <input type="number" class="form-control" id="input1" name="nik"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input2">NISN</label>
                                <input type="number" class="form-control" id="input2" name="nisn"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input3">NIPD</label>
                                <input type="text" class="form-control" id="input3" name="nipd" placeholder="NIPD">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input4">NO KK</label>
                                <input type="number" class="form-control" id="input4" name="nokk"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-3 col-md-9">
                                <label class="form-label" for="input5">Nama Lengkap</label>
                                <input type="text" class="form-control" id="input5" name="nama"
                                    placeholder="Nama Lengkap">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input6">Jenis Kelamin</label>
                                <div class="d-flex gap-3">
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" value="l" name="jenkel">
                                        <span class="form-check-label">
                                            Pria
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" value="p" name="jenkel">
                                        <span class="form-check-label">
                                            Wanita
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input7">Tempat Lahir</label>
                                <input type="text" class="form-control" id="input7" name="tmpLahir"
                                    placeholder="Tempat Lahir">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input8">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input8" name="tglLahir">
                                    <option value="" hidden>Tanggal Lahir</option>
                                    <?php
                                    for ($i = 1; $i < 32; $i++) {
                                        if ($i < 10) {
                                            $tgl = "0" . $i;
                                        } else {
                                            $tgl = $i;
                                        }
                                    ?>
                                    <option value="<?= $tgl ?>"><?= $tgl ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input9">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input9" name="blnLahir">
                                    <option value="" hidden>Bulan Lahir</option>
                                    <?php
                                    for ($i = 1; $i < 13; $i++) {
                                        if ($i < 10) {
                                            $bln = "0" . $i;
                                        } else {
                                            $bln = $i;
                                        }
                                    ?>
                                    <option value="<?= $bln ?>"><?= $bln ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input10">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input10" name="thnLahir">
                                    <option value="" hidden>Tahun Lahir</option>
                                    <?php
                                    for ($i = 1990; $i < date('Y')+5; $i++) {
                                            $thn = $i;
                                    ?>
                                    <option value="<?= $thn ?>"><?= $thn ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="input11">Alamat Lengkap</label>
                                <textarea class="form-control" id="input11" name="alamat" rows="2"
                                    placeholder="Diisi jalan, dusun, RT dan RW"></textarea>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input12">Provinsi</label>
                                <select class="form-control select2" data-toggle="select2" id="input12"
                                    name="provinsi">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input13">Kabupaten</label>
                                <select class="form-control select2" data-toggle="select2" id="input13"
                                    name="kabupaten">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input14">Kecamatan</label>
                                <select class="form-control select2" data-toggle="select2" id="input14"
                                    name="kecamatan">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="input15">Desa</label>
                                <select class="form-control select2" data-toggle="select2" id="input15"
                                    name="desa">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 d-flex gap-2">
                                <button type="button" class="btn btn-danger">Batal</button>
                                <a href="" class="btn btn-warning">Refresh</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary float-end">Simpan & Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $(".select2").select2();
        })
    </script>
@endsection
