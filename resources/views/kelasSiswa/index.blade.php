@extends('welcome')
@section('judul')
    Data Kelas Siswa
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Kelas Siswa</h1>
    <?php
    $dataThnAjr = DB::table('tahun_ajaran')->where('status', '=', 'aktif')->get();
    $dataProg = DB::table('program_keahlian')->where('status', '=', 'aktif')->get();
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="col-md-12">
                            <h3 class="mb-4">
                                <span>
                                    Setting Tahun Ajaran Dan Program Keahlian Terlebih Dahulu
                                </span>
                            </h3>
                            <div class="row">
                                <input type="hidden" id="idthn">
                                <input type="hidden" id="idprog">
                                <div class="col-md-6">
                                    <label class="form-label" for="input4">tahun Ajaran</label>
                                    <select class="form-control mb-3" id="thn" name="thn" required>
                                        <option value="" hidden>Pilih Tahun Ajaran</option>
                                        <?php
                                            foreach ($dataThnAjr as  $val) {
                                                ?>
                                        <option value="<?= $val->id_tahun_ajaran ?>"><?= $val->tahun_ajaran ?></option>
                                        <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="input4">Program Keahlian</label>
                                    <select class="form-control mb-3" id="prog" name="prog" required>
                                        <option value="" hidden>Pilih Program Keahlian</option>
                                        <?php
                                            foreach ($dataProg as  $val) {
                                                ?>
                                        <option value="<?= $val->id_program_keahlian ?>">
                                            <?= $val->program_keahlian ?>
                                        </option>
                                        <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row data-kelas" id="input13">
                <!-- <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Kelas XIIA</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">
                                                        </div>
                                                        <p class="card-text">Kelas XIIA RPL (2023 - 2024)</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#"
                                                        class="btn btn-outline-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-start">Details</a>
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-end">Pindahkan</a>
                                                </div>
                                            </div>
                                        </div> -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('select#thn').change(function() {
                var i = $(this).val()
                $('#idthn').val(i)
            })
            $('select#prog').change(function() {
                var b = $(this).val()
                var t = $("#idthn").val()
                $.ajax({
                    type: 'POST',
                    url: '{{ route('classroomStudent.getKelas') }}',
                    data: {
                        "_token": '{{ csrf_token() }}',
                        "thn": t,
                        "prog": b
                    },
                    success: function(data) {
                        $('#loading').css("display", "none")
                        $("#input13").html("")
                        $("#input13").append(data)
                    }
                })
            })

            $('.data-kelas').on("click", ".pindahkan", function() {
                var id = $(this).attr("id")
                window.location.href = `{{ url('pindahkan') }}/` + id
            })

            $('.data-kelas').on("click", ".detail", function() {
                var id = $(this).attr("data")
                window.location.href = `{{ url('ClassDetail') }}/` + id
            })

        })
    </script>
@endsection
