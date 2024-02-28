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
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>NIPD</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: '{{ route('siswaData') }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nikSiswa',
                        name: 'nikSiswa'
                    },
                    {
                        data: 'namaSiswa',
                        name: 'namaSiswa',
                    },
                    {
                        data: 'nipdSiswa',
                        name: 'nipdSiswa'
                    },
                    {
                        data: 'berkas',
                        name: 'berkas'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ]
            })

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
