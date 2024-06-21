@extends('welcome')
@section('judul')
    Data Program Keahlian
@endsection

@section('konten')
    <h1 class="h3 mb-3">Form Program Keahlian</h1>
    <div class="row">
        <div class="col-12">
            <form id="simpan" data-parsley-validate method="post">
                <div class="card">
                    <div class="card-body">
                            {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Bidang Keahlian</label>
                                    <input type="text" class="form-control mb-3 text-uppercase"  name="bidKeh" required>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Konsentrasi Keahlian</label>
                                    <input type="text" class="form-control mb-3 text-uppercase"  name="konsKeh" required>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Program Keahlian</label>
                                    <input type="text" class="form-control mb-3 text-uppercase"  name="progKeh" required>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="input4">Tahun Dibuat</label>
                                    <input type="date" class="form-control mb-3"  name="thn" required>
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
    <script>
        $(document).ready(function () {

            $("#simpan").on('submit', function(e) {
                e.preventDefault()
                var data = $(this).serialize()
                var form = $(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('program.simpanProgKeh') }}',
                        data: data,
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            if (hasil == 'k') {
                                swal.fire({
                                    title: 'Error',
                                    text: 'Gagal dalam menyimpan data',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6'
                                })
                            } else if (hasil == "S") {
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

            $('#batal').click(function() {
                window.location.href = "{{ url('/program') }}"
            })
        })
    </script>
@endsection
