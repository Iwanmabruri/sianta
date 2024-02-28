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
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button">Detail</button></li>
                                                <li><button class="dropdown-item" type="button">Edit</button></li>
                                                <li><button class="dropdown-item" type="button">Upload</button></li>
                                                <li><button class="dropdown-item" type="button">Print</button></li>
                                            </ul>
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
