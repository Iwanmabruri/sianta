@extends('welcome')
@section('judul')
    Data Siswa
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Siswa</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/step1') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:40%;">Name</th>
                                    <th style="width:25%">Phone Number</th>
                                    <th class="d-none d-md-table-cell" style="width:25%">Date of Birth</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
