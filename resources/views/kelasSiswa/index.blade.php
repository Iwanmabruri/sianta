@extends('welcome')
@section('judul')
    Data Kelas Siswa
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Kelas Siswa</h1>
    <?php
        $dataThnAjr = DB::table('tahun_ajaran')->where('status','=','aktif')->get();
        $dataProg = DB::table('program_keahlian')->where('status','=','aktif')->get();
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="col-md-12">
                            <h3 class="mb-4">
                                <span>
                                    diharap mensetting tahun ajaran dan program keahlian terlebih dahulu
                                </span>
                            </h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="input4">tahun Ajaran</label>
                                    <select class="form-control mb-3" id="smt" name="smt" required>
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
                                <div class="col-md-6   ">
                                    <label class="form-label" for="input4">Program Keahlian</label>
                                    <select class="form-control mb-3" id="smt" name="smt" required>
                                        <option value="" hidden>Pilih Program Keahlian</option>
                                        <?php
                                            foreach ($dataProg as  $val) {
                                                ?>
                                                <option value="<?= $val->id_program_keahlian ?>"><?= $val->bidang_keahlian ?></option>
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
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
