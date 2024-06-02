@extends('welcome')
@section('judul')
    Data tahun Ajaran
@endsection

@section('konten')
    <h1 class="h3 mb-3">Form tahun Ajaran</h1>
    <?php
        $data =  DB::table('program_keahlian')->where('id_program_keahlian','=',$id)->first();
    ?>
    <div class="row">
        <div class="col-12">
            <form id="edit" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-body">
                            {{ csrf_field() }}
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Bidang Keahlian</label>
                                    <input type="text" class="form-control mb-3"  name="bidKeh"
                                    value="<?= $data->bidang_keahlian ?>"
                                    required>
                                </div>
                                <div class="mb-2 col-md-4">
                                <label class="form-label" for="input4">Program Keahlian</label>
                                    <select class="form-control mb-3" id="progKeh" name="progKeh" required>
                                        <option value="" hidden>Pilih program keahlian</option>
                                        <?php
                                        if ($data->program_keahlian == "rpl") {
                                            $t = "selected";
                                            $i = "";
                                        } else { 
                                            $i = "selected";
                                            $t = "";
                                        }
                                        ?>
                                        
                                        <option <?= $t ?> value="rpl" >RPL</option>
                                        <option <?= $i ?> value="akuntansi" >AKUNTANSI</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Tahun Dibuat</label>
                                    <input type="date" class="form-control mb-3"  name="thn" 
                                    value="<?= $data->tahun_dibuat ?>"
                                    required>
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

            $("#edit").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('program.edit') }}',
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
                                    window.location.href = "{{ route('program.index') }}" 
                                    
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
