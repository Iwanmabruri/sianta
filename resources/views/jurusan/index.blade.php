@extends('welcome')
@section('judul')
    Data Jurusan
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Jurusan</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" id="tambah">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped data-table" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bid. Keahlian</th>
                                <th class="d-none d-md-table-cell">Prog. Keahlian</th>
                                <th>Pembuatan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
                    url: '{{ route('program.dataProgram') }}',
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
                        data: 'bidangKeahlian',
                        name: 'bidangKeahlian'
                    },
                    {
                        data: 'programKeahlian',
                        name: 'programKeahlian',
                    },
                    {
                        data: 'tahunDibuat',
                        name: 'tahunDibuat',
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
                window.location.href = "{{ url('form_data_progKeh') }}"
            })

            $('.data-table').on("click", ".edit", function () {
                var id=$(this).attr("id")
                window.location.href=`{{url('form_data_progKeh2')}}/`+id
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
                            url: '{{ route('program.hapusProgKeh') }}',
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
                                            window.location.href = "{{ route('program.index') }}" 
                                            
                                        })
                                    }
                            }
                        })
                    }
                })
            })
        })
    </script>
@endsection
