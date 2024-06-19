<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Formulir</title>

    <style>
        * {
            font-family: "Times New Roman", Times, serif;
            font-size: 11px;
        }

        .pertama {
            display: flex;
            justify-content: space-between;
        }

        .pertama .nomor {
            width: 35%;
            padding: 5px;
            border: 3px double #000000;
            font-weight: bold;
        }

        .kedua {
            margin-top: 15px;
        }

        table {
            width: 100%;
        }

        span.poin {
            font-weight: bold;
        }

        .kolom {
            padding-left: 30px;
        }

        .column {
            padding-left: 50px;
        }
    </style>

    <!-- <script>
        window.print();
        window.onafterprint = function(e) {
            window.close();
        };
    </script> -->
</head>

<body>
    <?php
    $data = DB::table('siswa')->where('id_siswa', $id)->first();
    
    $desa = DB::table('desa')
        ->where('id', $data->desa)
        ->first();
    
    $kecamatan = DB::table('kecamatan')
        ->where('id', $data->kecamatan)
        ->first();
    
    $kabupaten = DB::table('kabupaten')
        ->where('id', $data->kabKota)
        ->first();
    
    $prodi = DB::table('program_keahlian')
        ->where('id_program_keahlian', $data->id_program_keahlian)
        ->first();
    
    // function tgl_indo($tanggal)
    // {
    //     $bulan = [
    //         1 => 'JANUARI',
    //         'FEBRUARI',
    //         'MARET',
    //         'APRIL',
    //         'MEI',
    //         'JUNI',
    //         'JULI',
    //         'AGUSTUS',
    //         'SEPTEMBER',
    //         'OKTOBER',
    //         'NOVEMBER',
    //         'DESEMBER',
    //     ];
    //     $pecahkan = explode('-', $tanggal);
    
    //     return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    // }
    
    ?>
    <div class="konten">
        <div class="pertama">
            <div class="nomor">
                <span>NIS : <?= $data->nipdSiswa ?></span>
            </div>
            <div class="nomor">
                <span>NISN : <?= $data->nisnSiswa ?></span>
            </div>
        </div>

        <div class="kedua">
            <table cellpadding="3">
                <tbody>
                    <tr>
                        <td colspan="3">
                            <span class="poin">A. KETERANGAN TENTANG PESERTA DIDIK</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">1. NAMA LENGKAP</td>
                        <td width="50%">:&nbsp;<?= $data->namaSiswa ?></td>
                        <td rowspan="9">
                            <div
                                style="margin: auto; width: 113.38582677165px; height: 151.1811023622px; border: 1px solid #000000">
                                <div style="width:100%;height:100%;">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">2. JENIS KELAMIN</td>
                        <td width="50%">:&nbsp;<?= $data->jk == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">3. TEMPAT LAHIR</td>
                        <td width="50%">:&nbsp;<?= $data->tempatLahir ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">4. TANGGAL LAHIR</td>
                        <td width="50%">:&nbsp;
                            <?= $data->tglLahir ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">5. AGAMA</td>
                        <td width="50%">:&nbsp;<?= $data->agama ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">6. KEWARGANEGARAAN</td>
                        <td width="50%">:&nbsp;WNI</td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">7. ANAK KEBERAPA</td>
                        <td width="50%">:&nbsp;<?= $data->anakKe ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">8. JML SAUDARA KANDUNG</td>
                        <td width="50%">:&nbsp;<?= $data->jmlSaudara ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">9. JUMLAH SAUDARA TIRI</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span class="poin">B. KETERANGAN TEMPAT TINGGAL</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">10. ALAMAT</td>
                        <td width="50%" colspan="2">
                            : <?= $desa->name ?> <?= $kecamatan->name ?> <?= $kabupaten->name ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">11. NO TELP/HP</td>
                        <td width="50%">:&nbsp;<?= $data->nohp ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">12. TINGGAL DENGAN/DI</td>
                        <td width="50%">:&nbsp;<?= $data->jnsTempTinggal ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span class="poin">C. KETERANGAN PENDIDIKAN</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom" colspan="2">13. PENDIDIKAN SEBELUMNYA</td>
                        <td rowspan="12">
                            <div
                                style="margin: auto; width: 113.38582677165px; height: 151.1811023622px; border: 1px solid #000000">
                                <div style="width:100%;height:100%;">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">A. TAMATAN DARI</td>
                        <td width="50%">:&nbsp;<?= $data->sklAsal ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">B. NOMOR IJAZAH</td>
                        <td width="50%">:&nbsp;<?= $data->noIjazah ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">C. NOMOR SKHUN</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">D. LAMA BELAJAR</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom" colspan="2">14. PINDAH</td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">A. KE SEKOLAH</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">B. ALASAN</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom" colspan="2">15. DITERIMA DISEKOLAH INI</td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">A. KELAS</td>
                        <td width="50%">:&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">B. KOMPETENSI KEAHLIAN</td>
                        <td width="50%">:&nbsp;<?= strtoupper($prodi->program_keahlian) ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="column">C. TANGGAL</td>
                        <td width="50%">:&nbsp;<?= $data->tglDiterima ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span class="poin">D. KETERANGAN TENTANG AYAH KANDUNG</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">16. NAMA</td>
                        <td width="50%">:&nbsp;<?= $data->nmAyah ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">17. TEMPAT DAN TGL LAHIR</td>
                        <td width="50%">:&nbsp;<?= $data->tglLahirAyah ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">18. AGAMA</td>
                        <td width="50%">:&nbsp;<?= $data->agama ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">19. PEKERJAAN</td>
                        <td width="50%">:&nbsp;<?= $data->pkrjnAyah ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">20. ALAMAT</td>
                        <td width="50%" colspan="2">:&nbsp;<?= $desa->name ?> <?= $kecamatan->name ?>
                            <?= $kabupaten->name ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span class="poin">D. KETERANGAN TENTANG IBU KANDUNG</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">21. NAMA</td>
                        <td width="50%">:&nbsp;<?= $data->nmIbu ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">22. TEMPAT DAN TGL LAHIR</td>
                        <td width="50%">:&nbsp;<?= $data->tglLahirIbu ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">23. AGAMA</td>
                        <td width="50%">:&nbsp;<?= $data->agama ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">24. PEKERJAAN</td>
                        <td width="50%">:&nbsp;<?= $data->pkrjnIbu ?></td>
                        <td rowspan="8">
                            <div
                                style="margin: auto; width: 113.38582677165px; height: 151.1811023622px; border: 1px solid #000000">
                                <div style="width:100%;height:100%;">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">25. ALAMAT</td>
                        <td width="50%" colspan="2">:&nbsp;<?= $desa->name ?> <?= $kecamatan->name ?>
                            <?= $kabupaten->name ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span class="poin">D. KETERANGAN TENTANG WALI</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">26. NAMA</td>
                        <td width="50%">:&nbsp;<?= $data->nmWali ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">27. TEMPAT DAN TGL LAHIR</td>
                        <td width="50%">:&nbsp;<?= $data->tglLahirWali ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">28. AGAMA</td>
                        <td width="50%">:&nbsp;<?= $data->agama ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">29. PEKERJAAN</td>
                        <td width="50%">:&nbsp;<?= $data->pkrjnWali ?></td>
                    </tr>
                    <tr>
                        <td width="33%" class="kolom">30. ALAMAT</td>
                        <td width="50%">:&nbsp;<?= $desa->name ?> <?= $kecamatan->name ?>
                            <?= $kabupaten->name ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
