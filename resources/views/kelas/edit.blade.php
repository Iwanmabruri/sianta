@extends('welcome')
@section('judul')
    Data Kelas
@endsection

@section('konten')
    <h1 class="h3 mb-3">Form Kelas</h1>
    <?php
        $data = DB::table('kelas')->where('id_kelas','=',$id)->first();
        $dataThn = DB::table('tahun_ajaran')->where('status','=','aktif')->get();
        $dataPeg = DB::table('pegawai')->where('status','=','aktif')->get();
        $dataProg = DB::table('program_keahlian')->where('status','=','aktif')->get();
    ?>
    <div class="row">
        <div class="col-12">
            <form id="simpan" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-body">
                            {{ csrf_field() }}
                        <input type="hidden" value="<?= $id?>" name="id">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Kelas</label>
                                    <select class="form-control mb-3" id="kls" name="kls" required>
                                        <option value="" hidden>Pilih Kelas</option>
                                        <?php
                                        if ($data->kelas == "X") {
                                            $a = "selected";
                                            $b = "";
                                            $c = "";
                                        } elseif ($data->kelas == "XI") {
                                            $a = "";
                                            $b = "selected";
                                            $c = "";
                                        } else {
                                            $a = "";
                                            $b = "";
                                            $c = "selected";
                                        }
                                        ?>
                                        
                                        <option <?= $a ?> value="X" >X</option>
                                        <option <?= $b ?> value="XI" >XI</option>
                                        <option <?= $c ?> value="XII" >XII</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Wali Kelas</label>
                                    <select class="form-control mb-3" id="walikls" name="walikls" required>
                                        <option value="" hidden>Pilih wali Kelas</option>
                                        <?php
                                            foreach ($dataPeg as $val) {
                                                if ($data->id_pegawai == $val->id_pegawai) {
                                                ?>
                                                <option selected value="<?= $val->id_pegawai ?>"><?= $val->nmPeg ?></option>
                                            <?php
                                                    }else{
                                                ?>
                                                <option value="<?= $val->id_pegawai ?>"><?= $val->nmPeg ?></option>
                                            <?php
                                            }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Tahun Ajaran</label>
                                    <select class="form-control mb-3" name="thn_ajr" required>
                                        <option value="" hidden>Pilih Tahun Ajaran</option>
                                        <?php
                                            foreach ($dataThn as $val) {
                                                if ($data->id_tahun_ajaran == $val->id_tahun_ajaran) {
                                                ?>
                                                <option selected value="<?= $val->id_tahun_ajaran ?>"><?= $val->tahun_ajaran ?></option>
                                            <?php
                                                    }else{
                                                ?>
                                                <option value="<?= $val->id_tahun_ajaran ?>"><?= $val->tahun_ajaran ?></option>
                                            <?php
                                            }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label class="form-label" for="input4">Program Keahlian</label>
                                    <select class="form-control mb-3" name="prog_keah" required>
                                        <option value="" hidden>Pilih Program Keahlian</option>
                                        <?php
                                            foreach ($dataProg as $val) {
                                                if ($data->id_program_keahlian == $val->id_program_keahlian) {
                                                ?>
                                                <option selected value="<?= $val->id_program_keahlian ?>"><?= $val->program_keahlian ?></option>
                                            <?php
                                                    }else{
                                                ?>
                                                <option value="<?= $val->id_program_keahlian ?>"><?= $val->program_keahlian ?></option>
                                            <?php
                                            }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-6">
                                <label class="form-label" for="input1">Rumble</label>
                                <input type="text" class="form-control" id="input1" name="rumble"
                                    placeholder="Isi Nama rumble" value="<?= $data->rumble ?>" required>
                            </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="batal" type="button" class="btn btn-danger">Batal</button>
                                    <button class="btn btn-primary float-end">edit</button>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('select#smt').change(function () {
                var i = $(this).val()
                if (i == "1") {
                    $("#nmSmt").val("Ganjil")
                } else {
                    $("#nmSmt").val("Genap")
                }
            })


            $("#simpan").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url: '{{ route('kelas.editKls') }}',
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            if (hasil == 'k') {
                                swal.fire({
                                    title: 'Error',
                                    text: 'Gagal dalam menyimpan data',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6'
                                })
                            } else if (hasil == "S") {
                                swal.fire({
                                    title: 'success',
                                    text: 'Berhasil menyimpan data',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                }).then(function () {
                                    window.location.href = "{{ route('classroom.index') }}" 
                                    
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
