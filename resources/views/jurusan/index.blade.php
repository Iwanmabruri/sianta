@extends('welcome')
@section('judul')
    Data Jurusan
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Jurusan</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#centeredModalPrimary">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:40%;">No</th>
                                <th style="width:25%">Nama Jurusan</th>
                                <th class="d-none d-md-table-cell" style="width:25%">Kons Keahlian</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ashley Briggs</td>
                                <td>864-348-0485</td>
                                <td class="d-none d-md-table-cell">June 21, 1961</td>
                                <td class="table-action">
                                    <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#"><i class="align-middle" data-feather="trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="modal fade" id="centeredModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data Jurusan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-3">
                                    <label class="form-label" for="nmJurusan">Nama Jurusan</label>
                                    <input type="password" class="form-control" id="nmJurusan"
                                        placeholder="Isi Nama Jurusan">
                                    <label class="form-label mt-2" for="konsKeahlian">Kons Keahlian</label>
                                    <input type="password" class="form-control" id="konsKeahlian"
                                        placeholder="Isi Konsentrasi Keahlian">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
