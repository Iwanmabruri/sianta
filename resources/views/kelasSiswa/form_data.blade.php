@extends('welcome')
@section('judul')
    Data Kelas Siswa
@endsection

@section('konten')
    <h1 class="h3 mb-3">Data Kelas Siswa</h1>

    <div class="row">
        <div class="col-12">
            <form id="formKelasSiswa"  data-parsley-validate>
                {{ csrf_field()}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input1">NIK Pegawai</label>
                                <input type="number" class="nomor form-control" id="input1" name="nik_p" required>
                                <div id="product_list"></div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input2">Nama Pegawai</label>
                                <input type="text" class=" form-control" id="input2" name="nm_p" required>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="form-label" for="input1">Tahun Ajaran</label>
                                <select class="form-select" aria-label="Default select example" name="TA">
                                    <option selected>-- pilih --</option>
                                    <option value="2223">2022-2023</option>
                                    <option value="2324">2023-2024</option>
                                    <option value="2425">2024-2025</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div>
                                <hr>    
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="d-flex gap-1">
                                    <div>
                                        <span>Diharap memilih siswa terlebih </span><br>
                                        <span>dahulu sebelum menyimpan</span>
                                    </div>
                                    <div>
                                        <button id="cari" type="button" class="btn btn-success px-5"> <i data-feather="search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="d-flex gap-1">
                                    <table id="mytable" class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>nama</th>
                                                <th>alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mytablebody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button id="batal" type="button" class="btn btn-danger">Batal</button>
                                <button class="btn btn-primary float-end">simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


  <div class="modal fade" id="my-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">cari data</h5>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">
                    <button id="done" class="btn btn-primary">done</button>
                </div>
                <div class="card-body table-responsive">
                    <table id="mytableloop" class="table data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No</th>
                                <th>nama</th>
                                <th>alamat</th>
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
  </div>

    <script type="text/javascript">

        $(function () {
            $(".select2").select2();
            $('.nomor').focus()

            $(".nomor").keypress(function(e) {
                var charCode = (e.which) ? e.which : e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false
                }
            })

            $("#cari").click(function () {
                $('#my-modal').modal('show')    
            })

            $('#input1').on('keyup',function () {
                var query = $(this).val();
                $.ajax({
                    url:'{{ route('classroomStudent.autocomplete') }}',
                    type:'GET',
                    data:{'input1':query},
                    success:function (data) {
                        $('#product_list').html(data);
                    }
                })
            })
            
            $("#product_list").on('click', 'li', function(){
                var i = $(this).attr("data-pg");
                var a = $(this).attr("data-pg2");
                $('#input2').val(i);
                $('#input1').val(a);
                $('#product_list').html("");
            })

            var table = $('#mytableloop').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: '{{ route('classroomStudent.loopSiswa') }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'namaSiswa',
                        name: 'namaSiswa'
                    },
                    {
                        data: 'detAlamat',
                        name: 'detAlamat',
                    },
                ]
            })

            var checked = []
            function getChecked() {
                var checkboxes = document.querySelectorAll("input[type=checkbox]")

                for (var i = 0; i < checkboxes.length; i++) {
                    var checkbox = checkboxes[i];
                    if (checkbox.checked) checked.push({
                        nik : checkbox.value,
                        nama : checkbox.getAttribute("dt-nama"),
                        alamat : checkbox.getAttribute("dt-alamat")
                    });
                }
                return checked;
            }

            var obj = $('#done').on("click", function () {
                var r = getChecked()
                if (r == "") {
                    alert("harap di centang dulu")
                } else {
                    var i = r.map(function (e,key) {
                        var t =  key+1
                        return "<tr>"+"<td>"+t+"</td>"+"<td>"+"<input type='text' name='nik[]' value="+e.nik+">"+ e.nama+"</td>"+"<td>"+e.alamat+"</td></tr>"
                    })
                    $('#my-modal').modal('hide') 
                    $("#mytablebody").html('`' +i+ '`')
                }
                checked = []

            })

            $("#formKelasSiswa").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form =  $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url:"{{route('classroomStudent.insert_data')}}",
                        data:data,
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            if (hasil == 'N') {
                                Swal.fire({
                                    title: "Good job",
                                    text: "data berhasil disimpan",
                                    icon: "success"
                                }).then((result) => {
                                    window.location.href="{{route('employee.index')}}";
                                })
                            }else{
                                Swal.fire({
                                    title: "Oops .....",
                                    text: "NIK sudah ada",
                                    icon: "error"
                                }).then((result) => {
                                    $("#input1").focus()
                                })
                            }
                        }
                    })
                }
            })

            $('#batal').on('click', function () {
                window.location.href="{{route('employee.index')}}"
            })
        })
    </script>
@endsection
