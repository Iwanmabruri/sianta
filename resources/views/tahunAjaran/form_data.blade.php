@extends('welcome')
@section('judul')
    Data tahun Ajaran
@endsection

@section('konten')
    <h1 class="h3 mb-3">Form tahun Ajaran</h1>

    <div class="row">
        <div class="col-12">
            <form id="simpan" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-body">
                            {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label class="form-label" for="input4">Tahun Ajaran</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select class="form-control mb-3" id="input4" name="thn_ajr1" required>
                                                <option value="" hidden>Pilih Tahun Ajaran</option>
                                                <?php
                                                    for ($i = 2020; $i < date('Y')+4; $i++) {
                                                        $thn = $i;
                                                        ?>
                                                        <option value="<?= $thn ?>"><?= $thn ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <span>S/D</span>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control mb-3" id="input4" name="thn_ajr2" required>
                                                <option value="" hidden>Pilih Tahun Ajaran</option>
                                                <?php
                                                    for ($i = 2021; $i < date('Y')+5; $i++) {
                                                        $thn = $i;
                                                        ?>
                                                        <option value="<?= $thn ?>"><?= $thn ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label class="form-label" for="input4">Keterangan</label>
                                    <textarea  class="form-control mb-3" name="ket" id="" required></textarea>
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
            $("#simpan").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('tahunAjaran.simpan') }}',
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
                                    window.location.href = "{{ route('tahunAjaran.index') }}" 
                                    
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
