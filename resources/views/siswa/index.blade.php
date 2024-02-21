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
                    {{-- <a href="{{ url('/step1') }}" class="btn btn-primary">Tambah Data</a> --}}
                    <button id="tambah" class="btn btn-primary">Tambah Data</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIPD</th>
                                    <th>Alamat</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fulan Bin</td>
                                    <td>00000000</td>
                                    <td>Jl. Gajah Mada 009</td>
                                    <td>Actions</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu z-50">
                                                <a class="dropdown-item" href="#">Detail Data</a>
                                                <a class="dropdown-item" href="#">Edit Data</a>
                                                <a class="dropdown-item" href="#">Upload Berkas</a>
                                                <a class="dropdown-item" href="#">Print Formulir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Fulan Bin</td>
                                    <td>00000000</td>
                                    <td>Jl. Gajah Mada 009</td>
                                    <td>Actions</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu z-50">
                                                <a class="dropdown-item" href="#">Detail Data</a>
                                                <a class="dropdown-item" href="#">Edit Data</a>
                                                <a class="dropdown-item" href="#">Upload Berkas</a>
                                                <a class="dropdown-item" href="#">Print Formulir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#tambah').on('click', function() {
                $("#loading").css("display", "block")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('add-siswa') }}',
                    data: {
                        "_token": '{{ csrf_token() }}'
                    },
                    success: function(hasil) {
                        // $("#loading").css("display", "none")
                        // alert(hasil)
                        window.location.href = "{{ url('/step1') }}/" + hasil + "/st"
                    }
                })
            })
        })
    </script>
@endsection
