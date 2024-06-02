@extends('welcome')
@section('judul')
    Data tahun Ajaran
@endsection

@section('konten')
    <h1 class="h3 mb-3">Form tahun Ajaran</h1>
<?php
    $data =  DB::table('semester')->where('id_semester', '=', $id)->first();
    $tahun = DB::table('tahun_ajaran')->where('status','=','aktif')->get();
?>
    <div class="row">
        <div class="col-12">
        <form id="edit" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-body">
                            {{ csrf_field() }}
                        <input type="hidden" name="id" value="<?= $id?>">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Semester</label>
                                    <select class="form-control mb-3" id="smt" name="smt" required>
                                        <?php
                                        if ($data->semester == "1") {
                                            $t = "selected";
                                            $i = "";
                                        } else { 
                                            $i = "selected";
                                            $t = "";
                                        }
                                        ?>
                                    
                                        <option value="" hidden>Pilih Semester</option>
                                        <option <?= $t?> value="1" >1</option>
                                        <option <?= $i?> value="2" >2</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Nama Semester</label>
                                    <input type="text" class="form-control mb-3" 
                                    id="nmSmt" name="nmSmt" value="<?= $data->nama_semester?>" readonly>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Tahun Ajaran</label>
                                    <select class="form-control mb-3" name="thn_ajr" required>
                                        <option value="" hidden>Pilih Tahun Ajaran</option>
                                        <?php
                                            foreach ($tahun as $val) {
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

            $("#edit").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('semester.edit') }}',
                        data: data,
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
                                    window.location.href = "{{ route('semester.index') }}" 
                                    
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
