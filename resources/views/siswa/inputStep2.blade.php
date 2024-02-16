@extends('welcome')
@section('judul')
    Data Siswa | Step 2
@endsection

@section('konten')
    <h1 class="h3 mb-3">Detail Diri Dari Ananda <span class="text-danger">Fulanah</span></h1>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input1">Jenis Tempat Tinggal</label>
                                <select class="form-control mb-3" id="input1" name="tmpTinggal">
                                    <option value="">Pilih Tempat Tinggal</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input2">Status Anak</label>
                                <select class="form-control mb-3" id="input2" name="statusAnak">
                                    <option value="">Pilih Status</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input3">Anak Ke</label>
                                <input type="number" class="form-control" id="input3" name="anakKe"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input4">Jumlah Saudara</label>
                                <input type="number" class="form-control" id="input4" name="jmlSaudara"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input5">Nomor HP</label>
                                <input type="number" class="form-control" id="input5" name="noHp"
                                    placeholder="Isi dengan angka">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input6">Sekolah Asal</label>
                                <input type="text" class="form-control" id="input6" name="sekolahAsal"
                                    placeholder="Sekolah Asal">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input7">Nomor Ijazah</label>
                                <input type="text" class="form-control" id="input7" name="noIjazah"
                                    placeholder="Nomor Ijazah">
                            </div>
                            <div class="mb-2 col-md-3">
                                <label class="form-label" for="input8">Prodi</label>
                                <select class="form-control mb-3" id="input8" name="prodi">
                                    <option value="">Pilih Prodi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger">Batal</button>
                                <a href="" class="btn btn-warning">Refresh</a>
                                <div class="float-end">
                                    <a href="{{ url('/step1') }}" class="btn btn-primary">Kembali</a>
                                    <a href="{{ url('/step3') }}" class="btn btn-primary">Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
