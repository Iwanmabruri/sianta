@extends('welcome')
@section('judul')
    Data Kelas Siswa
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Kelas Siswa</h1>

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
                                <th>nama kelas</th>
                                <th>Jumlah siswa</th>
                                <th>nama wali kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="modal fade" id="my-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-insert">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <div class="mb-0 col-md-4">
                                <label class="form-label" for="input1">NIK Pegawai</label>
                                <input type="number" class="nomor form-control" id="input1" name="nik_p" required>
                                <div id="product_list"></div>
                            </div>
                            <div class="mb-0 col-md-4">
                                <label class="form-label" for="input2">Nama Pegawai</label>
                                <input type="text" class=" form-control" id="input2" name="nm_p" required>
                            </div>
                            <div class="mb-0 col-md-4">
                                <label class="form-label" for="input1">Tahun Ajaran</label>
                                <select class="form-select" aria-label="Default select example" id="thn_ajr" name="thn_ajr" required>
                                    <option selected>-- pilih --</option>
                                    <option value="2223">2022-2023</option>
                                    <option value="2324">2023-2024</option>
                                    <option value="2425">2024-2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn-primary float-end">simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div> -->
   
   <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#mytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: '{{ route('classroomStudent.kelasSiswaData') }}',
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'jml',
                        name: 'jml'
                    },
                    {
                        data: 'namaPeg',
                        name: 'namaPeg'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })

            // $('#input1').on('keyup',function () {
            //     var query = $(this).val();
            //     $.ajax({
            //         url:'{{ route('classroomStudent.autocomplete') }}',
            //         type:'GET',
            //         data:{'input1':query},
            //         success:function (data) {
            //             $('#product_list').html(data);
            //         }
            //     })
            // })
            
            // $("#product_list").on('click', 'li', function(){
            //     var i = $(this).attr("data-pg");
            //     var a = $(this).attr("data-pg2");
            //     $('#input2').val(i);
            //     $('#input1').val(a);
            //     $('#product_list').html("");
            // })

            // $('#form-insert').on('submit', function() {
            //     e.preventDefault()
            //     var data = $(this).serialize()
            //     var form =  $(this)
            //     form.parsley().validate()
            //     if (form.parsley().isValid()) {
            //         swal.fire({
            //         title: "Anda Yakin?",
            //         text: 'Anda tidak dapat mengmbalikan ini',
            //         icon: "question",
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Ya',
            //         cancelButtonText: 'Tidak'
            //     }).then((result) => {
            //         $("#loading").css("display", "block")
            //         if (result.isConfirmed) {
            //             $("#loading").css("display", "none")
            //             $.ajax({
            //             type: 'POST',
            //             url:"{{route('classroomStudent.insert_data')}}",
            //             data:data,
            //             success: function(hasil) {
            //                 $('#loading').css("display", "none")
            //                 if (hasil == 'N') {
            //                     Swal.fire({
            //                         title: "Good job",
            //                         text: "data berhasil disimpan",
            //                         icon: "success"
            //                     }).then((result) => {
            //                         window.location.href="{{route('employee.index')}}";
            //                     })
            //                 }else{
            //                     Swal.fire({
            //                         title: "Oops .....",
            //                         text: "NIK sudah ada",
            //                         icon: "error"
            //                     }).then((result) => {
            //                         $("#input1").focus()
            //                     })
            //                 }
            //             }
            //         })
            //         }
            //     })
            //     }
            // })

            $('.data-table').on("click", ".setting", function () {
                var id=$(this).attr("id")
                var peg=$(this).attr("nikpeg")
                window.location.href=`{{route('employee.form_data')}}/`+id+"/"+peg;
                
            })
        })
    </script>
@endsection
