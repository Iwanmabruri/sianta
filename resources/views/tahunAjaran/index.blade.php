@extends('welcome')
@section('judul')
    Data Tahun Ajaran
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Tahun Ajaran</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button id="tambah" class="btn btn-primary">Tambah Data</button>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Nama Tahun Ajaran</th>
                                <th>Status</th>
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
        $(document).ready(function() {
            var table = $('#mytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: '{{ route('tahunAjaran.dataTahunAjaran') }}',
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
                        data: 'tahunAjaran',
                        name: 'tahunAjaran'
                    },
                    {
                        data: 'namaTahunAjaran',
                        name: 'namaTahunAjaran',
                    },
                    {
                        data: 'status',
                        name: 'status'
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
                window.location.href = "{{ url('form_data_thn') }}"
            })

            $('.data-table').on("click", ".edit", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('form_data_thn2')}}/`+id
            })

            $('.data-table').on("click", ".upload", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('form_upload')}}/`+id
            })

            $('.data-table').on("click", ".detail", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('form_detail')}}/`+id
            })
        })
    </script>
@endsection
