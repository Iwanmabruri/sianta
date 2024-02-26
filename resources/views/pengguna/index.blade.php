@extends('welcome')
@section('judul')
    Data Pengguna
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Pengguna</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $no = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->nikPeg }}</td>
                                    <td>{{ $user->levelUser }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: "{{ route('dataUser') }}",
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
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                ]
            });
        });
    </script>
@endsection
