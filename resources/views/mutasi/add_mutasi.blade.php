@extends('welcome')
@section('judul')
    Data Mutasi
@endsection

@section('konten')
    <h1 class="h3 mb-3">Set Mutasi Siswa</h1>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-header border-bottom py-1">
                        <h3 class="card-title mt-1">Mutasi Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="input1">Siswa</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input1" name=""
                                    placeholder="siswa" required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input2">Prog. Keahlian</label>
                                <select class="form-control mb-2" id="input2" name="" required>
                                    <option value="">-Prog. Keahlian-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input3">Kelas</label>
                                <select class="form-control mb-2" id="input3" name="" required>
                                    <option value="">-Kelas-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input4">Jenis Mutasi</label>
                                <select class="form-control mb-2" id="input4" name="" required>
                                    <option value="">-Jenis Mutasi-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input5">No Surat Mutasi</label>
                                <select class="form-control mb-2" id="input5" name="" required>
                                    <option value="">-Jenis Mutasi-</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input6">Dari/ke</label>
                                <input type="text" class="form-control mb-2 text-uppercase" id="input6" name=""
                                    placeholder="dari/ke" required autocomplete="off">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" for="input7">Alasan</label>
                                <textarea class="form-control mb-2 text-uppercase" id="input7" name="" rows="2" placeholder="Alasan"
                                    required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input8">Tanggal</label>
                                <input type="date" class="form-control mb-2" id="input8" name="" placeholder=""
                                    required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom py-1">
                        <h3 class="card-title mt-1">Berkas Mutasi Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="input9">Surat Mutasi</label>
                                <input type="file" class="form-control mb-2 text-uppercase" id="input9" name=""
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input10">Bukti Video</label>
                                <input type="file" class="form-control mb-2 text-uppercase" id="input10" name=""
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="input11">Surat Pernyataan</label>
                                <input type="file" class="form-control mb-2 text-uppercase" id="input11" name=""
                                    required autocomplete="off">
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
@endsection
