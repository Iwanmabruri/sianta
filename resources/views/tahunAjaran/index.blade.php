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
                                <th>keterangan</th>
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
                        data: 'keterangan',
                        name: 'keterangan',
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

            $('.data-table').on("click", ".hapus", function () {
                var id=$(this).attr("id")
                swal.fire({
                    title: "Anda Yakin?",
                    text: 'Anda tidak dapat mengmbalikan ini',
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loading").css("display", "block")
                        $.ajax({
                            type: "post",
                            url: '{{ route('tahunAjaran.hapusThn') }}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id" : id
                            },
                            success: function(hasil) {
                                $('#loading').css("display", "none")
                                    if (hasil == 'S') {
                                        swal.fire({
                                            title: 'success',
                                            text: 'Berhasil menyimpan data',
                                            icon: 'success',
                                            confirmButtonColor: '#3085d6',
                                        }).then(function () {
                                            window.location.href = "{{ route('tahunAjaran.index') }}" 
                                            
                                        })
                                    }
                            }
                        })
                    }
                })

            })

            $('.data-table').on("click", ".detail", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('form_detail')}}/`+id
            })
        })
    </script>
@endsection
