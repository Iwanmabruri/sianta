@extends('welcome')
@section('judul')
    Data Kelas
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Kelas</h1>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('create-class') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    @php
                        $no = 1;
                    @endphp
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Wali Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($classrooms as $classroom)
                            <tbody>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $classroom->nama_kelas }}</td>
                                    <td>{{ $classroom->nik_peg }}</td>
                                    <td class="table-action">
                                        <a href="{{ url('edit-class') }}" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
