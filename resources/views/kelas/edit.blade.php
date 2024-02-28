@extends('welcome')
@section('judul')
    Tambah Kelas
@endsection

@section('konten')
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="{{ url('add-class') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <h3>Edit Data Kelas</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col">
                                <label class="form-label" for="input1">Nama Kelas</label>
                                <input type="text" class="form-control" id="input1" name="nama_kelas"
                                    placeholder="Isi Nama Kelas" value="" required>
                            </div>
                            <div class="mb-2 col">
                                <label class="form-label" for="input1">Wali Kelas</label>
                                {{-- <input type="text" class="form-control" id="input1" name="nik_peg"
                                    placeholder="Isi Nama Wali Kelas" required> --}}
                                <select name="nik_peg" class="form-select">
                                    <option value="">Pilih Pegawai</option>
                                    {{-- @foreach ($employees as $employee)
                                        <option {{ old('nik_peg') == $category->id ? 'selected' : '' }}
                                            value="{{ $employee->nik_peg }}">{{ $employee->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <input type="hidden" class="form-control" id="input1" name="status" value="Aktif">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger">Batal</button>
                                <button type="submit" class="btn btn-primary float-end">simpan</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
