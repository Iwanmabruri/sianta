@extends('welcome')
@section('judul')
    Data Pegawai
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Pegawai</h1>

    <div class="row">
        <div class="col-12">
            <form id="formPegawai"  data-parsley-validate>
                {{ csrf_field()}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK Pegawai</label>
                                <input type="number" class="nomor form-control" id="input1" name="nik_p"
                                    data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka"
                                    placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input2">NIY Pegawai</label>
                                <input type="number" class="nomor form-control" id="input2" name="niy_p"
                                    data-parsley-length="[14,14]"
                                    data-parsley-length-message="harus diisi  14 angka"
                                    placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="input3">Nama Pegawai</label>
                                <input type="text" class="form-control" id="input3" name="nama_p"
                                    placeholder="Nama pegawai" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">Tanggal Lahir</label>
                                <select class="form-control mb-3" id="input4" name="tgl_p" required>
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
                                <select class="form-control mb-3" id="input5" name="bln_p" required>
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
                                <select class="form-control mb-3" id="input6" name="thn_p" required>
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
                                <label class="form-label" for="input7">No HP Pegawai</label>
                                <input type="number" class="nomor form-control" id="input7" name="noHp_p"
                                    data-parsley-length="[12,12]"
                                    data-parsley-length-message="harus diisi 12 angka"
                                    placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Jenis Kelamin</label>
                                <div class="d-flex gap-3">
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input mb-2" type="radio" required
                                                data-parsley-required-message="pilih salah satu" value="L"
                                                name="jenkel">
                                            <span class="form-check-label">
                                                Pria
                                            </span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input mb-2" type="radio" required
                                                data-parsley-required-message="pilih salah satu" value="P"
                                                name="jenkel">
                                            <span class="form-check-label">
                                                Wanita
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input9">Alamat Lengkap</label>
                                <textarea class="form-control mb-2" id="input9" name="alamat" rows="2"
                                    placeholder="Diisi jalan, dusun, RT dan RW" required></textarea>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input10">Tugas Tambahan</label>
                                <input type="text" class="form-control" id="input10" name="tug_t"
                                    placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input11">PTKGTK</label>
                                <input type="text" class="form-control" id="input11" name="ptkgtk"
                                    placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input12">TMT</label>
                                <input type="text" class="form-control" id="input12" name="tmt"
                                    placeholder="Isi dengan angka" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button id="batal" type="button" class="btn btn-danger">Batal</button>
                                <button class="btn btn-primary float-end">simpan</button>
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
                    return false
                }
            })

            $("#formPegawai").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form =  $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url:"{{route('employee.insert_data')}}",
                        data:data,
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            if (hasil == 'N') {
                                Swal.fire({
                                    title: "Oops .....",
                                    text: "NIK sudah ada",
                                    icon: "error"
                                }).then((result) => {
                                    $("#input1").focus()
                                })
                            } else if(hasil == 'Y') {
                                Swal.fire({
                                    title: "Oops .....",
                                    text: "NIY sudah ada",
                                    icon: "error"
                                }).then((result) => {
                                    $("#input2").focus()
                                })
                            } else if (hasil == "S") {
                                Swal.fire({
                                    title: "Good job",
                                    text: "data berhasil disimpan",
                                    icon: "success"
                                }).then((result) => {
                                    window.location.href="{{route('employee.index')}}";
                                })
                            }
                        }
                    })
                }
            })

            $('#batal').on('click', function () {
                window.location.href="{{route('employee.index')}}"
            })
        })
    </script>
@endsection
