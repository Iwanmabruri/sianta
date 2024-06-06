@extends('welcome')
@section('judul')
    Data Mutasi
@endsection

@section('konten')
    <h1 class="h3 mb-3">Set Mutasi Siswa</h1>
    <?php
        $data = DB::table('siswa')->where('id_siswa', $id)->first();
        
        $progrmKeahlian = DB::table('program_keahlian')
            ->where('id_program_keahlian', $data->id_program_keahlian)
            ->first();
            
        $kelas = DB::table('kelas')
            ->where('status', "aktif")
            ->get();
    ?>
    <div class="row">
        <div class="col-12">
            <form id="simpan" data-parsley-validate method="post">
            {{ csrf_field()}}
                <div class="card">
                    <div class="card-header border-bottom py-1">
                        <h3 class="card-title mt-1">Mutasi Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="input1">Siswa</label>
                                    <input type="text" class="form-control mb-2 text-uppercase"
                                        placeholder="siswa" value="<?= $data->namaSiswa?>"  required readonly  >
                                    <input type="hidden" value="<?= $data->id_siswa?>" name="idS"  required   >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="input4">alamat</label>
                                    <input type="text" class="form-control mb-2 text-uppercase" id="input1" name=""
                                        placeholder="siswa" value="<?= $data->detAlamat?>"  required readonly  >
                                </div>
                                <div class="col-md-4">
                                <label class="form-label" for="input4">Program Keahlian</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name=""
                                        placeholder="siswa" value="<?= $progrmKeahlian->bidang_keahlian?>"  required readonly  >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="input4">Kelas</label>
                                    <select class="form-control mb-3" id="input4" name="kelas" required>
                                        <option value="" hidden>Pilih Kelas</option>
                                        <?php
                                            foreach ($kelas as  $val) {
                                                ?>
                                                <option value="<?= $val->id_kelas ?>"><?= $val->kelas ?> . <?= $val->ruang?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="input5">No Surat Mutasi</label>
                                    <input type="text" class="form-control mb-2 text-uppercase" id="input6" name="noSurat"
                                        placeholder="no surat"  required >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="input6">Pindah</label>
                                    <input type="text" class="form-control mb-2 text-uppercase" id="input6" name="pindah"
                                        placeholder="pindah" required >
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label" for="input7">Alasan</label>
                                    <textarea class="form-control mb-2 text-uppercase" id="input7" name="alasan" rows="2" placeholder="Alasan"
                                        required ></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="input8">Tanggal</label>
                                    <input type="date" class="form-control mb-2" id="input8" name="tanggal" placeholder=""
                                        required >
                                </div> 
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-danger">Batal</button>
                        <button class="btn btn-sm btn-primary float-end">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $("#simpan").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('mutasi.simpanMutasi') }}',
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
                                    window.location.href = "{{ url('/mutation') }}" 
                                    
                                })
                            }
                        }
                    })
                }
            })
    </script>
@endsection
