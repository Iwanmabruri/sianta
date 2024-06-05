@extends('welcome')
@section('judul')
    Data Kelas | Detail
@endsection

@section('konten')
    <?php
    $data = DB::table('kelas')->where('id_kelas', $id)->first();
    
    $progKeahlian = DB::table('program_keahlian')
        ->where('id_program_keahlian', $data->id_program_keahlian)
        ->first();

    $thnAjr = DB::table('tahun_ajaran')
        ->where('id_tahun_ajaran', $data->id_tahun_ajaran)
        ->first();

    $pegawai = DB::table('pegawai')
        ->where('id_pegawai', $data->id_pegawai)
        ->first();
    
    ?>
    <h1 class="h3 mb-3">Detail Kelas <?= $data->kelas ?></h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-2">
                    <a href="{{ url('/classroom') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body py-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 shadow">
                                <div class="card-header py-2 border-bottom">
                                    <h3 class="card-title">Data kelas</h3>
                                </div>
                                <div class="card-body py-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">Kelas</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->kelas ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Ruang</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->ruang ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Wali Kelas</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $pegawai->nmPeg ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nik Wali Kelas</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $pegawai->nikPeg ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Alamat Wali Kelas</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $pegawai->alamat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Jenis Kelamin Wali Kelas</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1">
                                                            <?= $pegawai->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Program Keahlian</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $progKeahlian->program_keahlian ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">bidang Keahlian</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $progKeahlian->bidang_keahlian ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Tahun Ajaran</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $thnAjr->tahun_ajaran ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
