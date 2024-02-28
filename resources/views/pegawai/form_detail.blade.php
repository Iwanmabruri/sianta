@extends('welcome')
@section('judul')
    Data Pegawai
@endsection
<?php  
    $data = DB::table('pegawai')->where("nikPeg","=",$id)->first();
    $waktu = explode("-", $data->ttl);
?>

@section('konten')
    <h1 class="h3 mb-3">Data Pegawai</h1>

    
<style>
    th{
        font-family: noto;
        font-size:11px;
        padding:8px !important;
    }

    td{
        padding:4px !important;
        font-size:14px;
        font-family: noto;
    }

    #tb_identitas tbody tr td{
        border-color: white !important;
        padding: 2px;
    }
    label{
        font-family: noto;
        font-size:14px;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route("employee.index")}}">
                    <button class="btn btn-danger">
                        <i class="fas fa-reply"></i>
                        Kembali
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="margin:0" class="mb-2"><b>IDENTITAS PEGAWAI</b></h5>
                            <hr style="line-height:9;margin:0;">
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td>NIK PEGAWAI</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->nikPeg ?></b></td>
                                </tr>
                                <tr>
                                    <td>NIY PEGAWAI</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->niyPeg ?></b></td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->nmPeg ?></b></td>
                                </tr>
                                <tr>
                                    <td>TANGGAL LAHIR</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->ttl?></b></td>
                                </tr>
                                <tr>
                                    <td>JENIS KELAMIN</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->jk ?></b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->alamat ?></b></td>
                                </tr>
                                <tr>
                                    <td>NO HP</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->noHp ?></b></td>
                                </tr>
                                <tr>
                                    <td>TUGAS TAMBAHAN</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->tugTambahan ?></b></td>
                                </tr>
                                <tr>
                                    <td>PTKGTK</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->PtkGtk ?></b></td>
                                </tr>
                                <tr>
                                    <td>TMT</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><b><?php echo $data->tmt ?></b></td>
                                </tr>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5><b>DOKUMEN PEGAWAI</b></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>IJAZAH</label>
                        <?php
                        if ($data->ijazah != "") {
                            ?>
                            <button jud="IJAZAH" foto="<?php echo asset($data->ijazah) ?>" class="bt_detail btn btn-info btn-sm btn-block mb-2">Detail</button>
                            <img class="img-thumbnail img-fluid" src="<?php echo asset($data->ijazah) ?>">
                            <?php
                        } else {
                            echo "<br>File Tidak Ada";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="md_tambah"  class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judul_detail"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <img style="width:100%;" class="img-fluid" id="gmbr_detail" src="">
                    </div>
                    <div class="col-md-4">
                        <a href="" id="img_download" download="">
                                <button class="btn btn-info">DOWNLOAD</button>
                                </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function () {
        $('#table').on("click", ".bt_edit", function () {
            var id = $(this).attr("id");
            window.location.href = "{{url('offline1')}}/" + id + "/ed";
        });


        $(".bt_detail").click(function () {
            var foto = $(this).attr("foto");
            var judul = $(this).attr("jud");
            $("#gmbr_detail").attr("src", foto);
            $("#img_download").attr("href", foto);
            //alert(foto);
            $(".judul_detail").html(judul);
            $("#md_tambah").modal({backdrop: 'static', keyboard: false});
        });
    });
</script>
@endsection
