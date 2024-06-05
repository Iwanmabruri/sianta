@extends('welcome')
@section('judul')
    Data Mutasi
@endsection
@section('konten')
<?php
    $data = DB::table('mutasi')->where('id_mutasi', $id)->first();
    
    $progrmKeahlian = DB::table('program_keahlian')
        ->where('id_program_keahlian', $data->id_program_keahlian)
        ->first();

    $siswa = DB::table('siswa')
        ->where('id_siswa', $data->id_siswa)
        ->first();
        
    $kelas = DB::table('kelas')
        ->where('id_kelas', $data->id_kelas)
        ->first();
   ?>
    <h1 class="h3 mb-3">Update Mutasi Siswa</h1>
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom py-1">
                        <h3 class="card-title mt-1">Mutasi Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="input1">Siswa</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name="idS"
                                    placeholder="siswa" value="<?= $siswa->namaSiswa?>"  required readonly  autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input4">alamat</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name="idS"
                                    placeholder="siswa" value="<?= $siswa->detAlamat?>"  required readonly  autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input2">Prog. Keahlian</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name="idS"
                                    placeholder="siswa" value="<?= $progrmKeahlian->bidang_keahlian?>"  required readonly  autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input3">Kelas</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name="idS"
                                    placeholder="siswa" value="<?= $kelas->kelas?>. <?= $kelas->ruang?>"  required readonly  autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input5">No Surat Mutasi</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input6" name=""
                                    placeholder="no surat" readonly value="<?= $data->noSuratMutasi?>" required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input6">Pindah</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input6" name=""
                                    placeholder="pindah" readonly value="<?= $data->pindah?>" required autocomplete="off">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" for="input7">Alasan</label>
                                <textarea class="form-control mb-2 text-uppercase" id="input7" name="" rows="2" placeholder="Alasan"
                                    required readonly><?= $data->AlasanPindah?></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input8">Tanggal</label>
                                <input type="date" class="form-control mb-2" id="input8" name="" placeholder=""
                                    required autocomplete="off" readonly value="<?= $data->tglMutasi?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom py-1">
                        <h3 class="card-title mt-1">Berkas Mutasi Siswa</h3>
                    </div>
                    <form id="formUpload" data-parsley-validate>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="suratPernyataan" value="<?= $data->suratPernyataan ?>">
                        <input type="hidden" name="berkasVideo" value="<?= $data->berkasVideo ?>">
                        <input type="hidden" name="suratMutasi" value="<?= $data->suratMutasi ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="suratPernyataan">Surat Pernyataan</label>
                                        <?php
                                        if ($data->suratPernyataan != '') {
                                            $surat_pernyataaan = '';
                                        ?>
                                        <div id="ed_prev1" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="ed_img1"
                                                style="background-repeat: no-repeat;background-position: left;background-size: contain;background-image:url('<?= asset($data->suratPernyataan) ?>');width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <?php
                                        } else {
                                            $surat_pernyataaan = 'required';
                                        }
                                        
                                        ?>
                                        <div id="prev1" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="img1" style="width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <button type="button" id="batal1" class="btn btn-sm btn-danger mb-2">Batal</button>
                                        <input type="file" <?= $surat_pernyataaan ?> class="form-control" name="suratPernyataan"
                                            id="suratPernyataan">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="berkasVideo">Berkas Video</label>
                                        <?php
                                        if ($data->berkasVideo != '') {
                                            $berkas_video = '';
                                        ?>
                                        <div id="ed_prev2" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="ed_img2"
                                                style="background-repeat: no-repeat;background-position: left;background-size: contain;background-image:url('<?= asset($data->berkasVideo) ?>');width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <?php
                                        } else {
                                            $berkas_video = 'required';
                                        }
                                        
                                        ?>
                                        <div id="prev2" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="img2" style="width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <button type="button" id="batal2" class="btn btn-sm btn-danger mb-2">Batal</button>
                                        <input type="file" <?= $berkas_video ?> class="form-control" name="berkasVideo"
                                            id="berkasVideo">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="suratMutasi">Surat Mutasi</label>
                                        <?php
                                        if ($data->suratMutasi != '') {
                                            $surat_mutasi = '';
                                        ?>
                                        <div id="ed_prev3" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="ed_img3"
                                                style="background-repeat: no-repeat;background-position: left;background-size: contain;background-image:url('<?= asset($data->suratMutasi) ?>');width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <?php
                                        } else {
                                            $surat_mutasi = 'required';
                                        }
                                        
                                        ?>
                                        <div id="prev3" class="border mb-2"
                                            style="width: 113.38582677165px; height: 151.1811023622px;">
                                            <div id="img3" style="width:100%;height:100%;">
                                            </div>
                                        </div>
                                        <button type="button" id="batal3" class="btn btn-sm btn-danger mb-2">Batal</button>
                                        <input type="file" <?= $surat_mutasi ?> class="form-control" name="suratMutasi"
                                            id="suratMutasi">
                                    </div>
                                </div>
                            
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ url('/mutation') }}" class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

            $('#suratPernyataan').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        $("#ed_prev3").css("display", "none")
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
                $("#suratPernyataan").val("")
                $("#prev1").css("display", "none")
                $("#batal1").css("display", "none")
                $("#ed_prev1").css("display", "block")
            })

            $('#berkasVideo').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        $("#ed_prev2").css("display", "none")
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
                $("#berkasVideo").val("")
                $("#prev2").css("display", "none")
                $("#batal2").css("display", "none")
                $("#ed_prev2").css("display", "block")
            })

            $('#suratMutasi').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        $("#ed_prev3").css("display", "none")
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
                $("#suratMutasi").val("")
                $("#prev3").css("display", "none")
                $("#batal3").css("display", "none")
                $("#ed_prev3").css("display", "block")
            })

            $('#formUpload').on('submit', function(e) {
                e.preventDefault()
                var form = $(this)
                var data = new FormData(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    // $('#loading').css("display", "block")
                    $.ajax({
                        type: 'post',
                        url: '{{ route('mutasi.uploadBerkasMutasi') }}',
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
                                    window.location.href = "{{ url('/mutation') }}"
                                });
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
