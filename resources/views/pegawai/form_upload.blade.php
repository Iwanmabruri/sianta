@extends('welcome')
@section('judul')
    Data Pegawai
@endsection
<?php  
    $data = DB::table('pegawai')->where("id_pegawai","=",$id)->first();
    $waktu = explode("-", $data->ttl);
?>

@section('konten')
    <h1 class="h3 mb-3">Data Pegawai</h1>

    <div class="row">
        <div class="col-12">
            <form id="formPegawai"  data-parsley-validate>
                {{ csrf_field()}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="nik_p" value="<?= $data->nikPeg?>" >
                            <input type="hidden" name="ft_ijazah_lama" value="<?= $data->ijazah?>">
        
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto ijazah Pegawai</label>
                                    <?php
                                        if($data->ijazah!=""){
                                            $ijazah="";
                                            ?>
                                            <div id="ed_priview1" class="col-md-12 mb-3 p-1 border" style="height:150px;">
                                                <div  id="ed_pr_img1" style="background-repeat: no-repeat;background-position: left;background-size: contain;background-image:url('<?php echo asset($data->ijazah) ?>');width:100%;height:100%;">
                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            $ijazah="required";
                                        }
                                    ?>
                                    <div id="priview1" class="col-md-12 mb-3 p-1 border" style="height:150px;">
                                        <div id="pr_img1" style="width:100%;height:100%;">
                                        </div>
                                    </div>
                                    <div id="batal1" class="col-md-12 p-0 mt-1 mb-1">
                                        <button type="button" class="btn btn-xs btn-warning">
                                            <i class="fas fa-times"></i>
                                            Batal
                                        </button>
                                    </div>
                                    <input <?php echo $ijazah ?> type="file"  name="ft_ijazah" id="ft_ijazah">
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


    <script type="text/javascript">

        $(function () {
            $("#priview1").css("display", "none");
            $("#batal1").css("display", "none");

            $("#ft_ijazah").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#ed_priview1").css("display", "none");
                    $("#priview1").css("display", "block");
                    $("#batal1").css("display", "block");
                    $("#pr_img1").css('background-image', 'url(' + e.target.result + ')');
                    $("#pr_img1").css("background-position", "left");
                    $("#pr_img1").css("background-size", "contain");
                    $("#pr_img1").css("background-repeat", "no-repeat");
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
        $("#batal1").click(function(){
            $("#ft_ijazah").val("");
            $("#priview1").css("display", "none");
            $("#batal1").css("display", "none");
            $("#ed_priview1").css("display", "block");
        });
        

            $("#formPegawai").on('submit', function(e) {
                e.preventDefault()
                var form =  $(this)
                var data = new FormData(this)
                form.parsley().validate()
                if (form.parsley().isValid()) {
                    $('#loading').css("display", "block")
                    $.ajax({
                        type: 'POST',
                        url:"{{route('employee.upload_data')}}",
                        data:data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(hasil) {
                            $('#loading').css("display", "none")
                            if (hasil == '1') {
                                Swal.fire({
                                    title: "Good job",
                                    text: "data berhasil disimpan",
                                    icon: "success"
                                }).then((result) => {
                                    window.location.href="{{route('employee.index')}}"
                                })
                            }  else  {
                                Swal.fire({
                                    title: "salahhhhhhhhhh",
                                    text: "data berhasil disimpan",
                                    icon: "success"
                                }).then((result) => {
                                
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
