@extends('welcome')
@section('judul')
    Data Siswa | Upload Berkas
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('nikSiswa', $nik)->first();
    ?>
    <h1 class="h3 mb-3">Upload Berkas <?= $data->namaSiswa ?></h1>
    <div class="row">
        <div class="col-12">
            <form id="formUpload" data-parsley-validate>
                {{ csrf_field() }}
                <input type="text" name="nik" value="<?= $nik ?>">
                <input type="text" name="fotoMasukLama" value="<?= $data->fotoMasuk ?>">
                <input type="text" name="fotoKKLama" value="<?= $data->fotoKK ?>">
                <input type="text" name="fotoAktaLama" value="<?= $data->fotoAkta ?>">
                <input type="text" name="fotoIjazahLama" value="<?= $data->fotoIjazah ?>">
                <input type="text" name="fotoKeluarLama" value="<?= $data->fotoKeluar ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="fotoDiri">Foto Diri</label>
                                <div id="prev1" class="border mb-2"
                                    style="width: 113.38582677165px; height: 151.1811023622px;">
                                    <div id="img1" style="width:100%;height:100%;">
                                    </div>
                                </div>
                                <button type="button" id="batal1" class="btn btn-sm btn-danger mb-2">Batal</button>
                                <input type="file" class="form-control" name="fotoMasuk" id="fotoDiri">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="scanKK">Scan Kartu Keluarga</label>
                                <div id="prev2" class="border mb-2"
                                    style="width: 113.38582677165px; height: 151.1811023622px;">
                                    <div id="img2" style="width:100%;height:100%;">
                                    </div>
                                </div>
                                <button type="button" id="batal2" class="btn btn-sm btn-danger mb-2">Batal</button>
                                <input type="file" class="form-control" name="fotoKK" id="scanKK">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="scanAkta">Scan Akta Kelahiran</label>
                                <div id="prev3" class="border mb-2"
                                    style="width: 113.38582677165px; height: 151.1811023622px;">
                                    <div id="img3" style="width:100%;height:100%;">
                                    </div>
                                </div>
                                <button type="button" id="batal3" class="btn btn-sm btn-danger mb-2">Batal</button>
                                <input type="file" class="form-control" name="fotoAkta" id="scanAkta">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label" for="scanIjazah">Scan Ijazah</label>
                                <div id="prev4" class="border mb-2"
                                    style="width: 113.38582677165px; height: 151.1811023622px;">
                                    <div id="img4" style="width:100%;height:100%;">
                                    </div>
                                </div>
                                <button type="button" id="batal4" class="btn btn-sm btn-danger mb-2">Batal</button>
                                <input type="file" class="form-control" name="fotoIjazah" id="scanIjazah">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="fotoLulus">Foto Kelulusan</label>
                                <div id="prev5" class="border mb-2"
                                    style="width: 113.38582677165px; height: 151.1811023622px;">
                                    <div id="img5" style="width:100%;height:100%;">
                                    </div>
                                </div>
                                <button type="button" id="batal5" class="btn btn-sm btn-danger mb-2">Batal</button>
                                <input type="file" class="form-control" name="fotoKeluar" id="fotoLulus">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('/student') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#prev1").css("display", "none")
            $("#batal1").css("display", "none")
            $("#prev2").css("display", "none")
            $("#batal2").css("display", "none")
            $("#prev3").css("display", "none")
            $("#batal3").css("display", "none")
            $("#prev4").css("display", "none")
            $("#batal4").css("display", "none")
            $("#prev5").css("display", "none")
            $("#batal5").css("display", "none")

            $('#fotoDiri').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        // $("#ed_prev1").css("display", "none")
                        $("#prev1").css("display", "block")
                        $("#batal1").css("display", "block")
                        $("#img1").css('background-image', 'url(' + e.target.result + ')')
                        $("#img1").css("background-position", "left")
                        $("#img1").css("background-size", "contain")
                        $("#img1").css("background-repeat", "no-repeat")
                    }
                    reader.readAsDataURL(this.files[0])
                }

            })

            $("#batal1").click(function() {
                $("#fotoDiri").val("")
                $("#prev1").css("display", "none")
                $("#batal1").css("display", "none")
                // $("#ed_prev1").css("display", "block")
            })

            $('#scanKK').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        // $("#ed_prev2").css("display", "none")
                        $("#prev2").css("display", "block")
                        $("#batal2").css("display", "block")
                        $("#img2").css('background-image', 'url(' + e.target.result + ')')
                        $("#img2").css("background-position", "left")
                        $("#img2").css("background-size", "contain")
                        $("#img2").css("background-repeat", "no-repeat")
                    }
                    reader.readAsDataURL(this.files[0])
                }

            })

            $("#batal2").click(function() {
                $("#scanKK").val("")
                $("#prev2").css("display", "none")
                $("#batal2").css("display", "none")
                // $("#ed_prev2").css("display", "block")
            })

            $('#scanAkta').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        // $("#ed_prev3").css("display", "none")
                        $("#prev3").css("display", "block")
                        $("#batal3").css("display", "block")
                        $("#img3").css('background-image', 'url(' + e.target.result + ')')
                        $("#img3").css("background-position", "left")
                        $("#img3").css("background-size", "contain")
                        $("#img3").css("background-repeat", "no-repeat")
                    }
                    reader.readAsDataURL(this.files[0])
                }

            })

            $("#batal3").click(function() {
                $("#scanAkta").val("")
                $("#prev3").css("display", "none")
                $("#batal3").css("display", "none")
                // $("#ed_prev3").css("display", "block")
            })

            $('#scanIjazah').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        // $("#ed_prev4").css("display", "none")
                        $("#prev4").css("display", "block")
                        $("#batal4").css("display", "block")
                        $("#img4").css('background-image', 'url(' + e.target.result + ')')
                        $("#img4").css("background-position", "left")
                        $("#img4").css("background-size", "contain")
                        $("#img4").css("background-repeat", "no-repeat")
                    }
                    reader.readAsDataURL(this.files[0])
                }

            })

            $("#batal4").click(function() {
                $("#scanIjazah").val("")
                $("#prev4").css("display", "none")
                $("#batal4").css("display", "none")
                // $("#ed_prev4").css("display", "block")
            })

            $('#fotoLulus').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        // $("#ed_prev5").css("display", "none")
                        $("#prev5").css("display", "block")
                        $("#batal5").css("display", "block")
                        $("#img5").css('background-image', 'url(' + e.target.result + ')')
                        $("#img5").css("background-position", "left")
                        $("#img5").css("background-size", "contain")
                        $("#img5").css("background-repeat", "no-repeat")
                    }
                    reader.readAsDataURL(this.files[0])
                }

            })

            $("#batal5").click(function() {
                $("#fotoLulus").val("")
                $("#prev5").css("display", "none")
                $("#batal5").css("display", "none")
                // $("#ed_prev5").css("display", "block")
            })

            $('#formUpload').on('submit', function(e) {
                e.preventDefault()
                var form = $(this)
                var data = new FormData(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'post',
                        url: '{{ route('upload-berkas') }}',
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(hasil) {
                            $("#loading").css("display", "none")
                            if (hasil == 1) {
                                swal.fire({
                                    title: 'Upload Sukses',
                                    text: 'Berkas berhasil disimpan',
                                    icon: 'success'
                                }).then(function() {
                                    window.location.href = "{{ url('/student') }}"
                                });
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
