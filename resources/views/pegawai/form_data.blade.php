@extends('welcome')
@section('judul')
    Data Pegawai
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Pegawai</h1>

    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Pegawai</label>
                                <input type="number" class="form-control" id="input1" name="nik_p"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input2">NIY Pegawai</label>
                                <input type="number" class="form-control" id="input2" name="niy_p"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="input3">Nama Pegawai</label>
                                <input type="number" class="form-control" id="input3" name="nama_p"
                                    placeholder="Nama pegawai">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input4" name="tgl_p">
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
                                <label class="form-label" for="input5">Bulan Lahir</label>
                                <select class="form-control mb-3" id="input5" name="bln_p">
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
                                <label class="form-label" for="input6">Tahun Lahir</label>
                                <select class="form-control mb-3" id="input6" name="thn_p">
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
                                <label class="form-label" for="input2">No HP Pegawai</label>
                                <input type="number" class="form-control" id="input2" name="niy_p"
                                    placeholder="Isi dengan angka">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">

        $(function () {
            $(".select2").select2();

            $(".nomor").keypress(function(e) {
                var charCode = (e.which) ? e.which : e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
            })

            
        })
    </script>
@endsection
