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
                                        <option value="<?= $val->id_program_keahlian ?>"><?= $val->bidang_keahlian ?>
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
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kelas XA</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">
                                    {{-- <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">
                                        X
                                    </span> --}}
                                </div>
                                <p class="card-text">Kelas XA RPL (2023 - 2024)</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#"
                                class="btn btn-outline-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-start">Details</a>
                            <a href="#"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-end">Pindahkan</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kelas XIA</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">
                                </div>
                                <p class="card-text">Kelas XIA RPL (2023 - 2024)</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#"
                                class="btn btn-outline-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-start">Details</a>
                            <a href="#"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-end">Pindahkan</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
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
                </div>
            </div>

        </div>
    </div>
@endsection
