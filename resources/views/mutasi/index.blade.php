@extends('welcome')
@section('judul')
    Data Mutasi
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Mutasi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Pindah</th>
                                <th>Alasan Pindah</th>
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
                    url: '{{ route('mutasi.dataMutasi') }}',
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
                        data: 'kelas',
                        name: 'kelas',
                    },
                    {
                        data: 'tgl',
                        name: 'tgl'
                    },
                    {
                        data: 'pindah',
                        name: 'pindah'
                    },
                    {
                        data: 'alasanPindah',
                        name: 'alasanPindah'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })


            $('.data-table').on("click", ".edit", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('updateMutasi')}}/`+id
            })

            $('.data-table').on("click", ".print", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('printMutasi')}}/`+id
            })

        })
    </script>
@endsection
