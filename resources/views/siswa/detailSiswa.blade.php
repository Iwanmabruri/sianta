@extends('welcome')
@section('judul')
    Data Siswa | Detail
@endsection

@section('konten')
    <?php
    $data = DB::table('siswa')->where('nikSiswa', $nik)->first();
    
    $prodi = DB::table('prodi')
        ->where('idProdi', $data->idProdi)
        ->first();
    
    $desa = DB::table('desa')
        ->where('id', $data->desa)
        ->first();
    
    $kecamatan = DB::table('kecamatan')
        ->where('id', $data->kecamatan)
        ->first();
    
    $kabupaten = DB::table('kabupaten')
        ->where('id', $data->kabKota)
        ->first();
    
    $provinsi = DB::table('provinsi')
        ->where('id', $data->provinsi)
        ->first();
    
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);
    
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
    <h1 class="h3 mb-3">Detail Data Ananda <?= $data->namaSiswa ?></h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-2">
                    <a href="{{ url('/student') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body py-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 shadow">
                                <div class="card-header py-2 border-bottom">
                                    <h3 class="card-title">Data Diri</h3>
                                </div>
                                <div class="card-body py-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">NIPD</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nipdSiswa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">NISN</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nisnSiswa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">NIK</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nikSiswa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">NO KK</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->noKK ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nama Lengkap</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->namaSiswa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Tempat Tanggal Lahir</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1">
                                                            <?= $data->tempatLahir . ', ' . tgl_indo($data->tglLahir) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Jenis Kelamin</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1">
                                                            <?= $data->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Anak Ke</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->anakKe ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Jumlah Saudara</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->jmlSaudara ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Agama</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->agama ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">Program Studi</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $prodi->nmProdi ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nomor Hp</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nohp ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Sekolah Asal</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->sklAsal ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nomor Ijazah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->noIjazah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Jenis Tinggal</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->jnsTempTinggal ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Alamat</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->detAlamat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Desa</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $desa->name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Kecamatan</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $kecamatan->name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Kabupaten</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $kabupaten->name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Provinsi</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $provinsi->name ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 shadow">
                                <div class="card-header py-2 border-bottom">
                                    <h3 class="card-title">Data Orang Tua</h3>
                                </div>
                                <div class="card-body  py-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">NIK Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nikAyah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nama Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nmAyah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Tanggal Lahir Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= tgl_indo($data->tglLahirAyah) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Pendidikan Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->pendAyah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Pekerjaan Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->pkrjnAyah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Penghasilan Ayah</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->penghAyah ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">NIK Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nikIbu ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Nama Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->nmIbu ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Tanggal Lahir Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= tgl_indo($data->tglLahirIbu) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Pendidikan Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->pendIbu ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Pekerjaan Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->pkrjnIbu ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-1">Penghasilan Ibu</td>
                                                        <td class="py-1">&nbsp;:&nbsp;</td>
                                                        <td class="py-1"><?= $data->penghIbu ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 shadow">
                                <div class="card-header border-bottom py-2">
                                    <h3 class="card-title">Data Wali</h3>
                                </div>
                                <div class="card-body py-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-1">NIK Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= $data->nikWali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">Nama Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= $data->nmWali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">Tanggal Lahir Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= tgl_indo($data->tglLahirWali) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">Pendidikan Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= $data->pendWali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">Pekerjaan Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= $data->pkrjnWali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">Penghasilan Wali</td>
                                                            <td class="py-1">&nbsp;:&nbsp;</td>
                                                            <td class="py-1"><?= $data->penghWali ?></td>
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
    </div>
@endsection
