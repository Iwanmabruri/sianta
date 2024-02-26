@extends('welcome')
@section('judul')
    Data Pegawai
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Pegawai</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button id="tambah" class="btn btn-primary">Tambah Data</button>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Berkas</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // $(function() {
        //     $('#table').DataTable()
        // })
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                searchable: true,
                ajax: {
                    type: "post",
                    url: '{{ route('employee.pegawai_data') }}',
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
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'berkas',
                        name: 'berkas'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })


            $('#tambah').on('click', function() {
                window.location.href = "{{ route('employee.form_data') }}"
            })

            $('.data-table').on("click", ".edit", function() {
                var id = $(this).attr("id")
                window.location.href = `{{ url('form_data2') }}/` + id
            });
        })
    </script>
@endsection
