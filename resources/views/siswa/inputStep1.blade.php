@extends('welcome')
@section('judul')
    Data Siswa | Step 1
@endsection

@section('konten')
    <h1 class="h3 mb-3">Detail Diri Dari Ananda <span class="text-danger" id="namaSiswa"></span></h1>
    <div class="row">
        <div class="col-12">
            <form id="formSiswa" data-parsley-validate>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">NIK</label>
                                <input type="number" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" class="nomor form-control mb-2"
                                    id="input1" name="nik" placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input2">NISN</label>
                                <input type="number" data-parsley-length="[10,10]"
                                    data-parsley-length-message="harus diisi 10 angka" class="nomor form-control mb-2"
                                    id="input2" name="nisn" placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input3">NIPD</label>
                                <input type="text" class="form-control mb-2" id="input3" name="nipd"
                                    placeholder="NIPD" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">NO KK</label>
                                <input type="number" data-parsley-length="[16,16]"
                                    data-parsley-length-message="harus diisi 16 angka" class="nomor form-control mb-2"
                                    id="input4" name="nokk" placeholder="Isi dengan angka" required>
                            </div>
                            <div class="mb-2 col-md-9">
                                <label class="form-label" for="input5">Nama Lengkap</label>
                                <input type="text" class="form-control mb-2" id="input5" name="nama"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input6">Jenis Kelamin</label>
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
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Tempat Lahir</label>
                                <input type="text" class="form-control mb-2" id="input7" name="tmpLahir"
                                    placeholder="Tempat Lahir" required>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Tanggal Lahir</label>
                                <select class="form-control mb-2" id="input8" name="tglLahir" required>
                                    <option value="" hidden>Pilih Tanggal</option>
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
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input9">Bulan Lahir</label>
                                <select class="form-control mb-2" id="input9" name="blnLahir" required>
                                    <option value="" hidden>Pilih Bulan</option>
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
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input10">Tahun Lahir</label>
                                <select class="form-control mb-2" id="input10" name="thnLahir" required>
                                    <option value="" hidden>Pilih Tahun</option>
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
                            <div class="mb-2 col-md-12">
                                <label class="form-label" for="input11">Alamat Lengkap</label>
                                <textarea class="form-control mb-2" id="input11" name="alamat" rows="2"
                                    placeholder="Diisi jalan, dusun, RT dan RW" required></textarea>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input12">Provinsi</label>
                                <select class="form-control mb-2 select2" data-toggle="select2" id="input12"
                                    name="provinsi" required="">
                                    <option value="">Pilih Provinsi</option>
                                    <?php 
                                    $prov = DB::table("provinsi")->get();
                                    foreach ($prov as $pr) { ?>
                                    <option value="<?= $pr->id ?>"><?= $pr->name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <script>
                                $(function() {
                                    $('#input12').change(function() {
                                        var idProv = $(this).val()
                                        $('#loading').css("display", "block")
                                        $.ajax({
                                            type: 'POST',
                                            url: '{{ route('getKabupaten') }}',
                                            data: {
                                                "_token": '{{ csrf_token() }}',
                                                "id": idProv,
                                                "kab": 0
                                            },
                                            success: function(data) {
                                                $('#loading').css("display", "none")
                                                $("#input13").html("")
                                                $("#input13").append(data)
                                                $("#input14").html("")
                                                $("#input14").append("<option value=''>Pilih Kecamatan</option>")
                                                $("#input15").html("");
                                                $("#input15").append("<option value=''>Pilih Desa</option>");
                                            }
                                        })
                                    })
                                })
                            </script>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input13">Kabupaten</label>
                                <select class="form-control mb-2 select2" data-toggle="select2" id="input13"
                                    name="kabupaten" required>
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                            <script>
                                $(function() {
                                    $('#input13').change(function() {
                                        var idKab = $(this).val()
                                        $('#loading').css("display", "block")
                                        $.ajax({
                                            type: 'POST',
                                            url: '{{ route('getKecamatan') }}',
                                            data: {
                                                "_token": '{{ csrf_token() }}',
                                                "id": idKab,
                                                "kec": 0
                                            },
                                            success: function(data) {
                                                $('#loading').css("display", "none")
                                                $("#input14").html("")
                                                $("#input14").append(data)
                                                $("#input15").html("");
                                                $("#input15").append("<option value=''>Pilih Desa</option>");
                                            }
                                        })
                                    })
                                })
                            </script>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input14">Kecamatan</label>
                                <select class="form-control mb-2 select2" data-toggle="select2" id="input14"
                                    name="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <script>
                                $(function() {
                                    $('#input14').change(function() {
                                        var idKec = $(this).val()
                                        $('#loading').css("display", "block")
                                        $.ajax({
                                            type: 'POST',
                                            url: '{{ route('getDesa') }}',
                                            data: {
                                                "_token": '{{ csrf_token() }}',
                                                "id": idKec,
                                                "des": 0
                                            },
                                            success: function(data) {
                                                $('#loading').css("display", "none")
                                                $("#input15").html("");
                                                $("#input15").append(data);
                                            }
                                        })
                                    })
                                })
                            </script>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Desa</label>
                                <select class="form-control mb-2 select2" data-toggle="select2" id="input15"
                                    name="desa" required>
                                    <option value="">Pilih Desa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger">Batal</button>
                                <a href="" class="btn btn-warning">Refresh</a>
                                {{-- <a href="{{ url('/step2') }}" class="btn btn-primary float-end">Lanjut</a> --}}
                                <button class="btn btn-primary float-end">Lanjut</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $('#input5').change(function() {
                var nm = $('#input5').val()
                document.getElementById("namaSiswa").innerHTML = nm
            })

            $(".select2").select2();

            $(".nomor").keypress(function(e) {
                var charCode = (e.which) ? e.which : e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
            })

            // $("#formSiswa").on('submit', function(e) {
            //     e.preventDefault()
            //     var data = $(this).serialize()
            //     form.parsley().validate()
            //     if (form.parsley().isValid()) {
            //         $('#loading').css("display", "block")
            //         $.ajax({
            //             type: 'POST',
            //             data: data,
            //             success: function(hasil) {
            //                 $('#loading').css("display", "none")
            //                 if (hasil == 'k') {
            //                     swal.fire({

            //                     })
            //                 } else {

            //                 }
            //             }
            //         })
            //     }
            // })
        })
    </script>
@endsection
