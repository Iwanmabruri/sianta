@extends('welcome')
@section('judul')
    Data Siswa | Step 2
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
                <input type="hidden" name="nikAwal" id="nik" value="<?= $nik ?>">
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
                                <input type="text" class="form-control mb-3 text-uppercase" id="input6" required
                                    name="pkrjnAyah" placeholder="Pekerjaan Ayah" autocomplete="off"
                                    value="<?= $data->pkrjnAyah ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Pendidikan Ayah</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input7" required
                                    name="pndknAyah" placeholder="Pendidikan Ayah" autocomplete="off"
                                    value="<?= $data->pendAyah ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Penghasilan Ayah</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input8" required
                                    name="pndptnAyah" placeholder="Penghasilan Ayah" autocomplete="off"
                                    value="<?= $data->penghAyah ?>">
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
                                <input type="text" class="form-control mb-3 text-uppercase" id="input14" required
                                    name="pkrjnIbu" placeholder="Pekerjaan Ibu" autocomplete="off"
                                    value="<?= $data->pkrjnIbu ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input15">Pendidikan Ibu</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input15" required
                                    name="pndknIbu" placeholder="Pendidikan Ibu" autocomplete="off"
                                    value="<?= $data->pendIbu ?>">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input16">Penghasilan Ibu</label>
                                <input type="text" class="form-control mb-3 text-uppercase" id="input16" required
                                    name="pndptnIbu" placeholder="Penghasilan Ibu" autocomplete="off"
                                    value="<?= $data->penghIbu ?>">
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
                window.location.href = "{{ url('/step1') }}/<?= $nik ?>/<?= $bt ?>"
            })

            $('#batalkan').click(function() {
                var nik = $('#nik').val()
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
                                "nik": nik
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
